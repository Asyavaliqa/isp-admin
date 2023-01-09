<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'username' => fake('id_ID')->unique()->userName(),
            'email' => fake('id_ID')->unique()->safeEmail(),
            'password' => Hash::make(('password')),
            'remember_token' => Str::random(10),
        ];
    }
}
