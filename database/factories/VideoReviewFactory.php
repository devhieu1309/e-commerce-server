<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VideoReview>
 */
class VideoReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => rand(1, 5),
            // 'title' => $this->faker->sentence(4),
            'title' => "demo" . $this->faker->unique()->numberBetween(1, 1000), 
            'url' => 'https://www.youtube.com/embed/' . $this->faker->regexify('[A-Za-z0-9_-]{11}'),
            'is_visible' => $this->faker->boolean(80),
        ];
    }
}
