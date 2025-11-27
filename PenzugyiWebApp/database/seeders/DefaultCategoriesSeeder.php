<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class DefaultCategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Transfer',
            'Housing',
            'Shopping',
            'Restaurant',
            'Bills',
            'Entertainment',
            'Transport',
        ];

        foreach ($categories as $name) {
            Category::create([
                'name' => $name,
                'type' => 'expense',
            ]);
        }

        // Add hidden Income category
        Category::create([
            'name' => 'Income',
            'type' => 'income',
        ]);

        $this->command->info('Fixed English categories created successfully!');
}
}
