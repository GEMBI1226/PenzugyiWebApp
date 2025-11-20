<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            // Létrehoz egy új usert, ha nem adtunk meg neki külsőleg
            'user_id' => User::factory(),
            'name' => fake()->word(),
            'type' => fake()->randomElement(['income', 'expense']),
        ];
    }
}