<?php

namespace Database\Factories;

use App\Models\Director;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->word(3, true),
            'image_url' =>fake()->imageUrl(),
            'released_at' => fake()->dateTimeBetween('-100 years', 'now'),
        ];
    }
}
