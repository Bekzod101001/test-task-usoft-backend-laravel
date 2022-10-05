<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
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
        $password = bcrypt('blablabla');
        return [
            'name' => fake()->name(),
            'phone' => fake()->phoneNumber(),
            'is_verified' => rand(0, 20) !== 0,
            'is_stop' => rand(0, 20) === 0,
            'is_business' => rand(0, 20) === 0,
            'password' => $password
        ];
    }
}
