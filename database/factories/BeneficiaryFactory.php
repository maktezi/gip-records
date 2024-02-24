<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Beneficiary>
 */
class BeneficiaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'office_id' => fake()->numberBetween(1, 5),
        'fname' => fake()->name(),
        'lname' => fake()->lastname(),
        'sex' => fake()->randomElement($array = array ('male', 'female')),
        'id_number' => fake()->numberBetween(10000, 50000),
        'assign_to' => fake()->name(),
        'status' => fake()->randomElement($array = array ('New', 'Extend', 'Warning')),
        'date_started' => fake()->date(),
        'date_end' => fake()->date(),
        'attachment' => fake()->name(),
        ];
    }
}
