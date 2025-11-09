<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'account_id' => Account::factory(),
            'category_id' => Category::factory(),
            'amount' => $this->faker->randomFloat(2, 10, 10000),
            'type' => $this->faker->randomElement(['income','expense','transfer']),
            'description' => $this->faker->sentence(),
            'date' => $this->faker->date(),

        ];
    }
}
