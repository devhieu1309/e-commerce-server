<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Variation>
 */
class VariationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryIds = Category::pluck('category_id')->toArray();
        return [
            'variation_name' => $this->faker->words(2, true),
            'category_id' => $categoryIds ? $this->faker->randomElement($categoryIds) : 1,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
