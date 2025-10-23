<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promotion>
 */
class PromotionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Tạo ngày bắt đầu và kết thúc hợp lệ
        $startDate = $this->faker->dateTimeBetween('-1 month', '+1 month');
        $endDate = $this->faker->dateTimeBetween($startDate, '+2 months');

        return [
            'promotion_name' => $this->faker->sentence(3),  // Ví dụ: "Ưu đãi mùa hè"
            'description' => $this->faker->paragraph(2),    // Mô tả khuyến mãi
            'discount_rate' => $this->faker->randomFloat(2, 1, 80), // 1% → 80%
            'start_date' => $startDate,
            'end_date' => $endDate,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
