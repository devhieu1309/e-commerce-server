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
        $titles = [
            'Redmi K90 Pro Max: SIÊU PHẨM SẮP RA MẮT CỦA XIAOMI CÓ GÌ?',
            'Đây là Laptop cao cấp ĐÁNG MUA nhất của Lenovo!',
            'Review Yoga Slim 7 Aura Edition',
            'Top 7 Món Đồ Công Nghệ Mùa Back To School 2025',
            'iPHONE 15 PRO MAX: KHUI HỘP, TRẢI NGHIỆM VÀ CHIA SẺ CHI TIẾT CÁCH DÙNG Ổ CỨNG GẮN NGOÀI',
            'Đánh giá iPhone 17 (So sánh kỹ với iPhone 16)',
            'Cả ngày với OPPO A6 Pro',
            'Trên tay OPPO Find X9, Find X9 Pro và Hasselblad Imaging Kit',
            'Review iPhone 17 sau 1 tuần sử dụng',
            'Đánh giá chi tiết Xiaomi 15T Pro'
        ];
        return [
            'product_id' => rand(1, 5),
            //'title' => "demo" . $this->faker->unique()->numberBetween(1, 1000), 
            'title' => $this->faker->randomElement($titles),
            'url' => 'https://www.youtube.com/embed/' . $this->faker->regexify('[A-Za-z0-9_-]{11}'),
            'is_visible' => $this->faker->boolean(80),
            'source_type' => 'youtube',
        ];
    }
}
