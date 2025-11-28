<?php

namespace App\Services;

use Gemini;
use Illuminate\Support\Facades\Log;

class GeminiService
{
    protected $client;
    
    public function __construct()
    {
        $apiKey = config('services.gemini.api_key', env('GEMINI_API_KEY'));
        $this->client = Gemini::client($apiKey);
    }
    
    /**
     * Send a message to Gemini AI with financial context
     *
     * @param string $userMessage
     * @param array $transactionContext
     * @return string
     */
    public function sendMessage(string $userMessage, array $transactionContext): string
    {
        try {
            // Build context from user's transaction data
            $contextPrompt = $this->buildContextPrompt($transactionContext);
            
            // System instruction to restrict AI to financial advice only
            $systemInstruction = "You are a professional financial advisor AI assistant. Your role is to provide ONLY financial advice, budgeting tips, spending analysis, and money management guidance. If asked about non-financial topics, politely redirect the conversation to financial matters. Be helpful, concise, and provide actionable advice based on the user's transaction data when relevant.";
            
            // Combine system instruction, context, and user message
            $fullPrompt = "{$systemInstruction}\n\nUser's Financial Context:\n{$contextPrompt}\n\nUser Question: {$userMessage}\n\nProvide a helpful, concise response:";
            
            // Call Gemini API using gemini-2.0-flash model
            $result = $this->client
                ->generativeModel(model: 'gemini-2.0-flash')
                ->generateContent($fullPrompt);
            
            return $result->text();
            
        } catch (\Exception $e) {
            Log::error('Gemini API Error: ' . $e->getMessage());
            return "I apologize, but I'm having trouble processing your request right now. Please try again in a moment.";
        }
    }
    
    /**
     * Build context prompt from transaction data
     *
     * @param array $context
     * @return string
     */
    private function buildContextPrompt(array $context): string
    {
        $prompt = "";
        
        if (isset($context['totalIncome'])) {
            $prompt .= "Total Income: " . number_format($context['totalIncome'], 0) . " Ft\n";
        }
        
        if (isset($context['totalExpense'])) {
            $prompt .= "Total Expenses: " . number_format($context['totalExpense'], 0) . " Ft\n";
        }
        
        if (isset($context['balance'])) {
            $prompt .= "Current Balance: " . number_format($context['balance'], 0) . " Ft\n";
        }
        
        if (isset($context['topCategories']) && !empty($context['topCategories'])) {
            $prompt .= "\nTop Spending Categories:\n";
            foreach ($context['topCategories'] as $category) {
                $prompt .= "- {$category['name']}: " . number_format($category['total'], 0) . " Ft\n";
            }
        }
        
        if (isset($context['recentTransactions']) && !empty($context['recentTransactions'])) {
            $prompt .= "\nRecent Transactions:\n";
            foreach ($context['recentTransactions'] as $transaction) {
                $type = $transaction['type'] === 'income' ? '+' : '-';
                $prompt .= "- {$type}" . number_format($transaction['amount'], 0) . " Ft - {$transaction['description']}\n";
            }
        }
        
        return $prompt;
    }
}
