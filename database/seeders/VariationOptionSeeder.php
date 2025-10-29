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

            ['variation_id' => 3, 'value' => 'Đen'],
            ['variation_id' => 3, 'value' => 'Trắng'],
            ['variation_id' => 3, 'value' => 'Xanh dương'],
            ['variation_id' => 3, 'value' => 'Hồng'],

            ['variation_id' => 4, 'value' => '128GB'],
            ['variation_id' => 4, 'value' => '256GB'],
            ['variation_id' => 4, 'value' => '512GB'],


            ['variation_id' => 5, 'value' => 'Đen'],
            ['variation_id' => 5, 'value' => 'Trắng'],
            ['variation_id' => 5, 'value' => 'Xanh dương'],
            ['variation_id' => 5, 'value' => 'Hồng'],

            ['variation_id' => 6, 'value' => '128GB'],
            ['variation_id' => 6, 'value' => '256GB'],
            ['variation_id' => 6, 'value' => '512GB'],
        ];

        foreach ($options as $option) {
            VariationOption::create($option);
        }
    }
}
