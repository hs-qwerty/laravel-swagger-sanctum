<?php

namespace Database\Factories;

use App\Enum\ActiveStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => rand(1,10),
            'name' => fake()->name(),
            'description' => fake()->text(150),
            'status' => ActiveStatus::ACTIVE->value
        ];
    }
}
