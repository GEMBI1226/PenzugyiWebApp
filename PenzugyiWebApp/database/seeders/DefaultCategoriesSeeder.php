<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class DefaultCategoriesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Utalás',
            'Otthon',
            'Bevásárlás',
            'Vendéglátás',
            'Számlák',
            'Szórakozás',
            'Közlekedés',
        ];

        foreach ($categories as $name) {
            Category::create([
                'name' => $name,
                'type' => 'expense',
            ]);
        }

        $this->command->info('Fixed Hungarian categories created successfully!');
    }
}
