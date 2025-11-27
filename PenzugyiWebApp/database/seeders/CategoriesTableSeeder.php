<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;

class CategoriesTableSeeder extends Seeder
{
    public function run(): void
    {
        // Create global categories
        Category::factory()->count(5)->create([
            'type' => 'income'
        ]);

        Category::factory()->count(10)->create([
            'type' => 'expense'
        ]);
    }
}