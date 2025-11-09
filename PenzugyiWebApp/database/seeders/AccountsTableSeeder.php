<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        User::all()->each(function($user) {
            Account::factory()->count(2)->create([
                'user_id' => $user->user_id
            ]);
        });
    }
}
