<?php

namespace Database\Factories;

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
        return [
            'title' =>  fake()->word(),
            'short_content' => fake()->sentence(),
            'content' => fake()->sentence(3),
            // 'photo'=>fake()->image('app/public/news', 100, 100)
        ];
    }
}
