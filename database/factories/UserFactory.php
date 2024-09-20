<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        return [
            'username'       => fake()->userName(),
            'password'       => 'pass',
            'remember_token' => Str::random(10),
        ];
    }
}
