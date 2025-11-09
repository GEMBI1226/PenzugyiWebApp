<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run(): void
    {
        // Minden felhasználóhoz létrehozunk kategóriákat
        User::all()->each(function ($user) {
            Category::factory()->count(5)->create([
                'user_id' => $user->user_id,
            ]);
        });
    }
}
