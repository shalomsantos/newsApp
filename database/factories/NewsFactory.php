<?php

namespace Database\Factories;

use App\Models\Type_news;
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
            'id_type_news' => fake()->numberBetween(0, Type_news::count()),
            'title' => fake()->title(),
            'desc_news' => fake()->paragraph(),
        ];
    }
}
