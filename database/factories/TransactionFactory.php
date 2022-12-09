<?php

namespace Database\Factories;

use App\Models\Customer;
use App\Models\User;
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
    public function definition(): array
    {
        return [
            'amount' => fake()->randomDigitNotNull() * 10,
            'payed' => fake()->boolean,
            'user_id' => User::all()->random(),
            'customer_id' => Customer::all()->random(),
            'datetime' => fake()->dateTimeThisMonth
        ];
    }
}
