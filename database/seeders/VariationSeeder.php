<?php

namespace Database\Seeders;

use App\Models\Variation;
use Illuminate\Database\Seeder;

class VariationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Variation::factory(20)->create();
        $variations = [
            // Dành cho điện thoại
            ['category_id' => 1, 'variation_name' => 'Màu sắc'],
            ['category_id' => 1, 'variation_name' => 'Dung lượng'],
            ['category_id' => 1, 'variation_name' => 'RAM'],
            ['category_id' => 1, 'variation_name' => 'Bộ nhớ'],
            ['category_id' => 1, 'variation_name' => 'Kích thước màn hình'],
            ['category_id' => 1, 'variation_name' => 'Chip xử lý'],

            // Dành cho laptop
            ['category_id' => 2, 'variation_name' => 'CPU'],
            ['category_id' => 2, 'variation_name' => 'RAM'],
            ['category_id' => 2, 'variation_name' => 'Ổ cứng'],
            ['category_id' => 2, 'variation_name' => 'Card đồ họa'],
            ['category_id' => 2, 'variation_name' => 'Màu sắc'],

            // Dành cho iPad
            ['category_id' => 3, 'variation_name' => 'Kích thước màn hình'],
            ['category_id' => 3, 'variation_name' => 'Bộ nhớ'],
            ['category_id' => 3, 'variation_name' => 'Dung lượng'],
            ['category_id' => 3, 'variation_name' => 'Màu sắc'],

            // Dành cho phụ kiện
            ['category_id' => 4, 'variation_name' => 'Loại phụ kiện'],
            ['category_id' => 4, 'variation_name' => 'Chất liệu'],
            ['category_id' => 4, 'variation_name' => 'Màu sắc'],
        ];

        foreach ($variations as $variation) {
            Variation::create($variation);
        }
    }
}
