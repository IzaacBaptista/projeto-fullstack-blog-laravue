<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'about' => $this->faker->text(),
            'image' => $this->faker->imageUrl(),
            'linkedin' => $this->faker->url(),
            'github' => $this->faker->url(),
            'instagram' => $this->faker->url()
        ];
    }
}
