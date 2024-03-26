<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'id_category' => $this->faker->numberBetween(1, 10),
            'id_author' => $this->faker->numberBetween(1, 10),
            'data' => $this->faker->date(),
            'time_read' => $this->faker->numberBetween(1, 10),
            'title' => $this->faker->sentence(),
            'content' => $this->faker->paragraphs(9, true),
            'blockquote' => $this->faker->sentence(),
            'image' => $this->faker->imageUrl()
        ];
    }
}
