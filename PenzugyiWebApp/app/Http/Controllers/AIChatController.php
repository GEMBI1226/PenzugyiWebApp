<?php

namespace App\Http\Controllers;

use App\Services\GeminiService;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AIChatController extends Controller
{
    protected $geminiService;
    
    public function __construct(GeminiService $geminiService)
    {
        $this->geminiService = $geminiService;
    }
    
    /**
     * Handle chat message from user
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000'
        ]);
        
        $user = Auth::user();
        $userMessage = $request->input('message');
        
        // Gather user's transaction context
        $transactionContext = $this->getUserTransactionContext($user->id);
        
        // Get AI response
        $aiResponse = $this->geminiService->sendMessage($userMessage, $transactionContext);
        
        return response()->json([
            'success' => true,
            'message' => $aiResponse
        ]);
    }
    
    /**
     * Get user's transaction context for AI
     *
     * @param int $userId
     * @return array
     */
    private function getUserTransactionContext(int $userId): array
    {
        // Get total income and expenses
        $totalIncome = Transaction::where('user_id', $userId)
            ->where('type', 'income')
            ->sum('amount');
            
        $totalExpense = Transaction::where('user_id', $userId)
            ->where('type', 'expense')
            ->sum('amount');
            
        $balance = $totalIncome - $totalExpense;
        
        // Get top spending categories
        $topCategories = Transaction::where('user_id', $userId)
            ->where('type', 'expense')
            ->selectRaw('category_id, SUM(amount) as total')
            ->groupBy('category_id')
            ->orderByDesc('total')
            ->limit(5)
            ->with('category')
            ->get()
            ->map(function ($item) {
                return [
                    'name' => $item->category->name ?? 'Uncategorized',
                    'total' => $item->total
                ];
            })
            ->toArray();
        
        // Get recent transactions
        $recentTransactions = Transaction::where('user_id', $userId)
            ->orderByDesc('date')
            ->limit(5)
            ->get()
            ->map(function ($transaction) {
                return [
                    'type' => $transaction->type,
                    'amount' => $transaction->amount,
                    'description' => $transaction->description
                ];
            })
            ->toArray();
        
        return [
            'totalIncome' => $totalIncome,
            'totalExpense' => $totalExpense,
            'balance' => $balance,
            'topCategories' => $topCategories,
            'recentTransactions' => $recentTransactions
        ];
    }
}
