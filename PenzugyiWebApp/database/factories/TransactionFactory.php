<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition(): array
    {
        // Először eldöntjük a típust, hogy a kategória és a tranzakció is ugyanolyan legyen
        $type = fake()->randomElement(['income', 'expense']);

        return [
            'user_id' => User::factory(),
            // Olyan kategóriát gyártunk hozzá, aminek a típusa megegyezik a fenti $type-pal
            'category_id' => Category::factory()->state(['type' => $type]),
            'amount' => fake()->randomFloat(2, 500, 50000),
            'type' => $type,
            'description' => fake()->sentence(),
            'date' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}