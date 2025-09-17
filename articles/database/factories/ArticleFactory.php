<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\articles>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'content' => $this->faker->paragraphs(3, true),
            'author' => $this->faker->name(),
            'status' => $this->faker->randomElement(['draft', 'published', 'archived']),
            'category' => $this->faker->randomElement(['technology', 'business', 'lifestyle', 'health', 'education']),
        ];
    }
}
