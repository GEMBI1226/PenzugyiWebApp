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

        foreach ($users as $user) {
            // Lekérjük az adott user SAJÁT kategóriáit, típus szerint szétválogatva
            $incomeCategories = Category::where('user_id', $user->id)->where('type', 'income')->get();
            $expenseCategories = Category::where('user_id', $user->id)->where('type', 'expense')->get();

            // Ha van bevétel kategóriája, csinálunk neki 5 bevételt
            if ($incomeCategories->count() > 0) {
                Transaction::factory()->count(5)->create([
                    'user_id' => $user->id,
                    'type' => 'income',
                    // Véletlenszerűen választunk egyet a user saját bevétel kategóriái közül
                    'category_id' => fn() => $incomeCategories->random()->category_id,
                ]);
            }

            // Ha van kiadás kategóriája, csinálunk neki 10 kiadást
            if ($expenseCategories->count() > 0) {
                Transaction::factory()->count(10)->create([
                    'user_id' => $user->id,
                    'type' => 'expense',
                    // Véletlenszerűen választunk egyet a user saját kiadás kategóriái közül
                    'category_id' => fn() => $expenseCategories->random()->category_id,
                ]);
            }
        }
    }
}