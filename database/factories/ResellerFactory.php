<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reseller>
 */
class ResellerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = fake('id_ID');

        $contractStart = now();

        return [
            'name' => $faker->company(),
            'email' => $faker->companyEmail(),
            'photo' => 'assets/img/logos/' . $faker->numberBetween(1, 30) . '.jpg',
            'phone_number' => $faker->e164PhoneNumber(),
            'address' => $faker->address(),
            'contract_start_at' => $contractStart,
            'contract_end_at' => $faker->dateTimeBetween($contractStart, '+3 years'),
        ];
    }
}
