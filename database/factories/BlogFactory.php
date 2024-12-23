<?php

namespace Database\Factories;

use App\Enum\ActiveStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'blog_category_id' => "1",
            'name' => fake()->name(),
            'description' => $this->faker->text(150),
            'status' => ActiveStatus::ACTIVE->value
        ];
    }
}
