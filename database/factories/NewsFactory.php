<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $admin = Admin::inRandomOrder()->first();

        return [
            'admin_id'    => $admin->id,
            'name'        => fake()->sentence(2),
            'description' => fake()->text(),
            'image'       => 'upload_image.jpg',
        ];
    }
}
