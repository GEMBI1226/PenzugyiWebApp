<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class StatisticsController extends Controller
{
    /**
     * Display the statistics page.
     */
    public function index(Request $request): View
    {
        $period = $request->get('period', 'monthly');
        $userId = Auth::id();

        // Build query for expenses only
        $query = Transaction::where('user_id', $userId)
            ->where('type', 'expense')
            ->whereNotNull('category_id');

        // Filter by period
        if ($period === 'monthly') {
            $query->whereYear('date', now()->year)
                  ->whereMonth('date', now()->month);
        } else {
            // yearly
            $query->whereYear('date', now()->year);
        }

        // Aggregate expenses by category
        $expensesByCategory = $query
            ->select('category_id', DB::raw('SUM(amount) as total'))
            ->groupBy('category_id')
            ->with('category')
            ->get();

        // Prepare data for Chart.js
        $chartData = [
            'labels' => [],
            'amounts' => [],
        ];

        $topCategories = [];

        foreach ($expensesByCategory as $expense) {
            if ($expense->category) {
                $chartData['labels'][] = $expense->category->name;
                $chartData['amounts'][] = (float) $expense->total;
                
                $topCategories[] = [
                    'name' => $expense->category->name,
                    'amount' => (float) $expense->total,
                ];
            }
        }

        // Sort and get top 3 categories
        usort($topCategories, function($a, $b) {
            return $b['amount'] <=> $a['amount'];
        });
        $topCategories = array_slice($topCategories, 0, 3);

        return view('statistics.index', [
            'chartData' => $chartData,
            'topCategories' => $topCategories,
            'period' => $period
        ]);
    }
}
