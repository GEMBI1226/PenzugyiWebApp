<?php

namespace App\Observers;

use App\Models\Transaction;
use Illuminate\Support\Str;

class TransactionObserver
{
    /**
     * Handle the Transaction "created" event.
     */
    public function created(Transaction $transaction): void
    {
        $user = $transaction->user;
        $startOfWeek = \Carbon\Carbon::now()->startOfWeek();
        $endOfWeek = \Carbon\Carbon::now()->endOfWeek();

        $weeklyExpense = \App\Models\Transaction::where('user_id', $user->id)
            ->where('type', 'expense')
            ->whereBetween('date', [$startOfWeek, $endOfWeek])
            ->sum('amount');

        if ($weeklyExpense > 100000) {
            $notifications = session()->get('notifications', []);
            $id = Str::uuid()->toString();
            
            $notifications[$id] = [
                'id' => $id,
                'message' => 'High Expense Alert: You have spent ' . number_format($weeklyExpense, 0, '.', ' ') . ' Ft this week!',
                'amount' => $weeklyExpense,
            ];

            session()->put('notifications', $notifications);
        }
    }
}
