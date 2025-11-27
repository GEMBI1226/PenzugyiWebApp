<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Fontos a sorrend! Előbb a User, aztán a Kategória, végül a Tranzakció.
        $this->call([
            UsersTableSeeder::class,
            DefaultCategoriesSeeder::class,
            TransactionsTableSeeder::class,
        ]);
    }
}