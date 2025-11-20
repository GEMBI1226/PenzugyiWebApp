<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Fix Teszt Felhasználó (ha még nem létezik)
        if (!User::where('email', 'test@example.com')->exists()) {
            User::factory()->create([
                'name' => 'Teszt Elek',
                'email' => 'test@example.com',
                'password' => bcrypt('password'),
                'balance' => 150000,
                'account_name' => 'Fő Számla',
                'account_type' => 'checking',
            ]);
        }

        // 2. Generálunk még 10 random felhasználót
        User::factory(10)->create();
    }
}