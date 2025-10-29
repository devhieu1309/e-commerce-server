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

            // Dành cho laptop
            ['category_id' => 2, 'variation_name' => 'Màu sắc'],
            ['category_id' => 2, 'variation_name' => 'Dung lượng'],

            // Dành cho iPad
            ['category_id' => 3, 'variation_name' => 'Màu sắc'],
            ['category_id' => 3, 'variation_name' => 'Dung lượng'],
        ];

        foreach ($variations as $variation) {
            Variation::create($variation);
        }
    }
}
