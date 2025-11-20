<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        // Calculate summary statistics
        $totalIncome = Transaction::where('user_id', $user->id)
            ->where('type', 'income')
            ->sum('amount');

        $totalExpense = Transaction::where('user_id', $user->id)
            ->where('type', 'expense')
            ->sum('amount');

        $balance = $totalIncome - $totalExpense;

        // Weekly data (last 7 days)
        $weeklyData = $this->getWeeklyData($user->id);

        // Monthly data (last 12 months)
        $monthlyData = $this->getMonthlyData($user->id);

        return view('dashboard', compact(
            'totalIncome',
            'totalExpense',
            'balance',
            'weeklyData',
            'monthlyData'
        ));
    }

    private function getWeeklyData($userId)
    {
        $startDate = Carbon::now()->subDays(6)->startOfDay();
        $endDate = Carbon::now()->endOfDay();

        $transactions = Transaction::where('user_id', $userId)
            ->whereBetween('date', [$startDate, $endDate])
            ->select(
                DB::raw('DATE(date) as date'),
                'type',
                DB::raw('SUM(amount) as total')
            )
            ->groupBy('date', 'type')
            ->get();

        // Initialize arrays for all 7 days
        $labels = [];
        $income = [];
        $expense = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::now()->subDays($i);
            $labels[] = $date->format('M d');
            $dateStr = $date->format('Y-m-d');

            $incomeAmount = $transactions->where('date', $dateStr)->where('type', 'income')->first()->total ?? 0;
            $expenseAmount = $transactions->where('date', $dateStr)->where('type', 'expense')->first()->total ?? 0;

            $income[] = $incomeAmount;
            $expense[] = $expenseAmount;
        }

        return [
            'labels' => $labels,
            'income' => $income,
            'expense' => $expense,
        ];
    }

    private function getMonthlyData($userId)
    {
        $startDate = Carbon::now()->subMonths(11)->startOfMonth();
        $endDate = Carbon::now()->endOfMonth();

        $transactions = Transaction::where('user_id', $userId)
            ->whereBetween('date', [$startDate, $endDate])
            ->select(
                DB::raw('YEAR(date) as year'),
                DB::raw('MONTH(date) as month'),
                'type',
                DB::raw('SUM(amount) as total')
            )
            ->groupBy('year', 'month', 'type')
            ->get();

        // Initialize arrays for all 12 months
        $labels = [];
        $income = [];
        $expense = [];

        for ($i = 11; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $labels[] = $date->format('M Y');
            $year = $date->year;
            $month = $date->month;

            $incomeAmount = $transactions->where('year', $year)->where('month', $month)->where('type', 'income')->first()->total ?? 0;
            $expenseAmount = $transactions->where('year', $year)->where('month', $month)->where('type', 'expense')->first()->total ?? 0;

            $income[] = $incomeAmount;
            $expense[] = $expenseAmount;
        }

        return [
            'labels' => $labels,
            'income' => $income,
            'expense' => $expense,
        ];
    }
}
