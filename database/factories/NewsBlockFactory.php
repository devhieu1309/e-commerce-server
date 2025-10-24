<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\NewsBlock;
use App\Models\News;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class NewsBlockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'title' => $this->faker->sentence(5),
            'content' => $this->faker->paragraph(4),
            'image' => 'news' . $this->faker->numberBetween(1, 10) . '.jpg',
            'position' => $this->faker->numberBetween(1, 10),
            'news_id' => News::inRandomOrder()->first()?->id ?? 1,
        ];
    }
}
