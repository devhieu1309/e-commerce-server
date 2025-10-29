<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductConfigurationSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('product_configurations')->insert([
            // iPhone 15 Pro Max
            [ 'product_item_id' => 1, 'variation_option_id' => 1 ], // Black
            [ 'product_item_id' => 1, 'variation_option_id' => 5 ], // 128GB
            [ 'product_item_id' => 2, 'variation_option_id' => 2 ], // White
            [ 'product_item_id' => 2, 'variation_option_id' => 6 ], // 256GB

            // Samsung Galaxy S24 Ultra
            [ 'product_item_id' => 3, 'variation_option_id' => 1 ],
            [ 'product_item_id' => 3, 'variation_option_id' => 5 ],
            [ 'product_item_id' => 4, 'variation_option_id' => 2 ],
            [ 'product_item_id' => 4, 'variation_option_id' => 6 ],

            // Xiaomi 14 Ultra
            [ 'product_item_id' => 5, 'variation_option_id' => 1 ],
            [ 'product_item_id' => 5, 'variation_option_id' => 5 ],
            [ 'product_item_id' => 6, 'variation_option_id' => 2 ],
            [ 'product_item_id' => 6, 'variation_option_id' => 6 ],

            // iPhone 14 Pro Max
            [ 'product_item_id' => 7, 'variation_option_id' => 1 ],
            [ 'product_item_id' => 7, 'variation_option_id' => 5 ],
            [ 'product_item_id' => 8, 'variation_option_id' => 2 ],
            [ 'product_item_id' => 8, 'variation_option_id' => 6 ],

            // Samsung A55
            [ 'product_item_id' => 9, 'variation_option_id' => 1 ],
            [ 'product_item_id' => 9, 'variation_option_id' => 5 ],
            [ 'product_item_id' => 10, 'variation_option_id' => 2 ],
            [ 'product_item_id' => 10, 'variation_option_id' => 6 ],

            // Redmi Note 13 Pro
            [ 'product_item_id' => 11, 'variation_option_id' => 1 ],
            [ 'product_item_id' => 11, 'variation_option_id' => 5 ],
            [ 'product_item_id' => 12, 'variation_option_id' => 2 ],
            [ 'product_item_id' => 12, 'variation_option_id' => 6 ],

            // Oppo Reno 11 F
            [ 'product_item_id' => 13, 'variation_option_id' => 1 ],
            [ 'product_item_id' => 13, 'variation_option_id' => 5 ],
            [ 'product_item_id' => 14, 'variation_option_id' => 2 ],
            [ 'product_item_id' => 14, 'variation_option_id' => 6 ],

            // Vivo V30
            [ 'product_item_id' => 15, 'variation_option_id' => 1 ],
            [ 'product_item_id' => 15, 'variation_option_id' => 5 ],
            [ 'product_item_id' => 16, 'variation_option_id' => 2 ],
            [ 'product_item_id' => 16, 'variation_option_id' => 6 ],

            // Google Pixel 8
            [ 'product_item_id' => 17, 'variation_option_id' => 1 ],
            [ 'product_item_id' => 17, 'variation_option_id' => 5 ],
            [ 'product_item_id' => 18, 'variation_option_id' => 2 ],
            [ 'product_item_id' => 18, 'variation_option_id' => 6 ],

            // Realme 12+
            [ 'product_item_id' => 19, 'variation_option_id' => 1 ],
            [ 'product_item_id' => 19, 'variation_option_id' => 5 ],
            [ 'product_item_id' => 20, 'variation_option_id' => 2 ],
            [ 'product_item_id' => 20, 'variation_option_id' => 6 ],
        ]);
    }
}
