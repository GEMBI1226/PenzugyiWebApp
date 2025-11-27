<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\Category;
use App\Models\User;

class TransactionsTableSeeder extends Seeder
{
    public function run(): void
    {
        // Lekérjük az összes usert
        $users = User::all();

        // Get all global categories
        $incomeCategories = Category::where('type', 'income')->get();
        $expenseCategories = Category::where('type', 'expense')->get();

        foreach ($users as $user) {
            // Create income transactions
            if ($incomeCategories->count() > 0) {
                Transaction::factory()->count(5)->create([
                    'user_id' => $user->id,
                    'type' => 'income',
                    'category_id' => fn() => $incomeCategories->random()->category_id,
                ]);
            }

            // Create expense transactions
            if ($expenseCategories->count() > 0) {
                Transaction::factory()->count(10)->create([
                    'user_id' => $user->id,
                    'type' => 'expense',
                    'category_id' => fn() => $expenseCategories->random()->category_id,
                ]);
            }
        }
    }
}