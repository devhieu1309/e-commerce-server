<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comments>
 */
class CommentsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fullname' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'content' => $this->faker->paragraph(3),
            'news_id' => News::inRandomOrder()->first()?->id ?? News::factory(),
            'user_id' => $this->faker->optional()->randomElement(
                User::pluck('user_id')->toArray()
            ), // có thể null
        ];
    }
}
