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

        return [
            'name' => $faker->company(),
            'email' => $faker->companyEmail(),
            'phone_number' => $faker->e164PhoneNumber(),
            'address' => $faker->address(),
            'is_ppn' => $faker->randomElement([true, false]),
        ];
    }
}
