<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VariationOption;

class VariationOptionSeeder extends Seeder
{
    public function run()
    {
        $options = [
            // Cho điện thoại
            ['variation_id' => 1, 'value' => 'Đen'],
            ['variation_id' => 1, 'value' => 'Trắng'],
            ['variation_id' => 1, 'value' => 'Xanh dương'],
            ['variation_id' => 1, 'value' => 'Hồng'],

            ['variation_id' => 2, 'value' => '128GB'],
            ['variation_id' => 2, 'value' => '256GB'],
            ['variation_id' => 2, 'value' => '512GB'],

            ['variation_id' => 3, 'value' => '6GB'],
            ['variation_id' => 3, 'value' => '8GB'],
            ['variation_id' => 3, 'value' => '12GB'],

            ['variation_id' => 4, 'value' => '64GB'],
            ['variation_id' => 4, 'value' => '128GB'],
            ['variation_id' => 4, 'value' => '256GB'],

            ['variation_id' => 5, 'value' => '6.1 inch'],
            ['variation_id' => 5, 'value' => '6.7 inch'],

            ['variation_id' => 6, 'value' => 'Apple A16 Bionic'],
            ['variation_id' => 6, 'value' => 'Snapdragon 8 Gen 2'],

            // Cho laptop
            ['variation_id' => 7, 'value' => 'Intel Core i5'],
            ['variation_id' => 7, 'value' => 'Intel Core i7'],
            ['variation_id' => 7, 'value' => 'Apple M1'],
            ['variation_id' => 7, 'value' => 'Apple M2'],

            ['variation_id' => 8, 'value' => '8GB'],
            ['variation_id' => 8, 'value' => '16GB'],
            ['variation_id' => 8, 'value' => '32GB'],

            ['variation_id' => 9, 'value' => 'SSD 256GB'],
            ['variation_id' => 9, 'value' => 'SSD 512GB'],
            ['variation_id' => 9, 'value' => 'SSD 1TB'],

            ['variation_id' => 10, 'value' => 'Intel Iris Xe'],
            ['variation_id' => 10, 'value' => 'NVIDIA RTX 4060'],
            ['variation_id' => 10, 'value' => 'Apple GPU'],

            ['variation_id' => 11, 'value' => 'Bạc'],
            ['variation_id' => 11, 'value' => 'Xám'],
            ['variation_id' => 11, 'value' => 'Đen'],

            // Cho iPad
            ['variation_id' => 12, 'value' => '10.2 inch'],
            ['variation_id' => 12, 'value' => '11 inch'],
            ['variation_id' => 12, 'value' => '12.9 inch'],

            ['variation_id' => 13, 'value' => '64GB'],
            ['variation_id' => 13, 'value' => '256GB'],
            ['variation_id' => 13, 'value' => '512GB'],

            ['variation_id' => 14, 'value' => 'WiFi'],
            ['variation_id' => 14, 'value' => 'WiFi + Cellular'],

            ['variation_id' => 15, 'value' => 'Bạc'],
            ['variation_id' => 15, 'value' => 'Xám không gian'],
            ['variation_id' => 15, 'value' => 'Hồng'],

            // Phụ kiện
            ['variation_id' => 16, 'value' => 'Cáp sạc'],
            ['variation_id' => 16, 'value' => 'Ốp lưng'],
            ['variation_id' => 16, 'value' => 'Tai nghe'],
            ['variation_id' => 16, 'value' => 'Cốc sạc'],

            ['variation_id' => 17, 'value' => 'Nhựa'],
            ['variation_id' => 17, 'value' => 'Silicone'],
            ['variation_id' => 17, 'value' => 'Da'],

            ['variation_id' => 18, 'value' => 'Trắng'],
            ['variation_id' => 18, 'value' => 'Đen'],
            ['variation_id' => 18, 'value' => 'Đỏ'],
        ];

        foreach ($options as $option) {
            VariationOption::create($option);
        }
    }
}
