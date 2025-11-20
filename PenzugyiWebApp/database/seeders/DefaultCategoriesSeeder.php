<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;

class DefaultCategoriesSeeder extends Seeder
{
    public function run(): void
    {
        // Get the first user (or you can specify a specific user)
        $user = User::first();

        if (!$user) {
            $this->command->error('No user found. Please create a user first.');
            return;
        }

        // Add default categories
        $categories = [
            ['name' => 'Számla', 'type' => 'expense'],
            ['name' => 'Egyéb', 'type' => 'expense'],
        ];

        foreach ($categories as $categoryData) {
            Category::create([
                'user_id' => $user->id,
                'name' => $categoryData['name'],
                'type' => $categoryData['type'],
            ]);
        }

        $this->command->info('Default categories created successfully!');
    }
}
