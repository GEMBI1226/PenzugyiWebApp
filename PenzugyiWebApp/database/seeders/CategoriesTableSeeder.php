<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;

class CategoriesTableSeeder extends Seeder
{
    public function run(): void
    {
        // Lekérjük az összes usert, akit az előző seeder létrehozott
        $users = User::all();

        foreach ($users as $user) {
            // Minden usernek csinálunk 3 bevétel kategóriát
            Category::factory()->count(3)->create([
                'type' => 'income'
            ]);

            // És 5 kiadás kategóriát
            Category::factory()->count(5)->create([
                'type' => 'expense'
            ]);
        }
    }
}