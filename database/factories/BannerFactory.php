<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categories>
 */
class BannerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->unique()->sentence(3), // 3 từ
            'image' => $this->faker->unique()->image('public/storage/images', 640, 480, null, false),
            'link_url' => $this->faker->unique()->url(),
            'position' => $this->faker->randomElement(['home', 'product']),
            'is_active' => $this->faker->boolean(),
        ];
    }
}
