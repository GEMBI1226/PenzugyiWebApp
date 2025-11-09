<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransactionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        // Minden számlához létrehozunk tranzakciókat
        Account::all()->each(function ($account) {
            // Véletlenszerű kategóriát választunk a felhasználóhoz
            $categories = Category::where('user_id', $account->user_id)->get();

            Transaction::factory()->count(10)->create([
                'account_id' => $account->account_id,
                'category_id' => $categories->isNotEmpty() ? $categories->random()->category_id : null,
            ]);
        });
    }
}
