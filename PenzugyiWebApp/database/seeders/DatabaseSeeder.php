<?php

namespace Database\Seeders;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
            AccountsTableSeeder::class,
            CategoriesTableSeeder::class,
            TransactionsTableSeeder::class,
        ]);
    }


}

