<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductConfigurationSeeder extends Seeder
{
    public function run(): void
    {
        // Vàng, Hồng, Trắng
        DB::table('product_configurations')->insert([
            // iPhone 15 Pro Max
            // Vàng
            ['product_item_id' => 1, 'variation_option_id' => 1],
            ['product_item_id' => 1, 'variation_option_id' => 5],

            // Hồng
            ['product_item_id' => 2, 'variation_option_id' => 2],
            ['product_item_id' => 2, 'variation_option_id' => 6],

            // // Trắng
            ['product_item_id' => 61, 'variation_option_id' => 3],
            ['product_item_id' => 61, 'variation_option_id' => 4],

            // Samsung Galaxy S24 Ultra
            ['product_item_id' => 3, 'variation_option_id' => 1],
            ['product_item_id' => 3, 'variation_option_id' => 5],
            ['product_item_id' => 4, 'variation_option_id' => 2],
            ['product_item_id' => 4, 'variation_option_id' => 6],

            // Xiaomi 14 Ultra
            ['product_item_id' => 5, 'variation_option_id' => 1],
            ['product_item_id' => 5, 'variation_option_id' => 5],
            ['product_item_id' => 6, 'variation_option_id' => 2],
            ['product_item_id' => 6, 'variation_option_id' => 6],

            // Samsung Galaxy A55
            ['product_item_id' => 7, 'variation_option_id' => 1],
            ['product_item_id' => 7, 'variation_option_id' => 5],
            ['product_item_id' => 8, 'variation_option_id' => 2],
            ['product_item_id' => 8, 'variation_option_id' => 6],

            // Xiaomi Redmi Note 13 Pro
            ['product_item_id' => 9, 'variation_option_id' => 1],
            ['product_item_id' => 9, 'variation_option_id' => 5],
            ['product_item_id' => 10, 'variation_option_id' => 2],
            ['product_item_id' => 10, 'variation_option_id' => 6],

            // Oppo Reno 11 F
            ['product_item_id' => 11, 'variation_option_id' => 1],
            ['product_item_id' => 11, 'variation_option_id' => 5],
            ['product_item_id' => 12, 'variation_option_id' => 2],
            ['product_item_id' => 12, 'variation_option_id' => 6],

            // Vivo V30
            ['product_item_id' => 13, 'variation_option_id' => 1],
            ['product_item_id' => 13, 'variation_option_id' => 5],
            ['product_item_id' => 14, 'variation_option_id' => 2],
            ['product_item_id' => 14, 'variation_option_id' => 6],

            // Google Pixel 8
            ['product_item_id' => 15, 'variation_option_id' => 1],
            ['product_item_id' => 15, 'variation_option_id' => 5],
            ['product_item_id' => 16, 'variation_option_id' => 2],
            ['product_item_id' => 16, 'variation_option_id' => 6],

            // Realme 12+
            ['product_item_id' => 17, 'variation_option_id' => 1],
            ['product_item_id' => 17, 'variation_option_id' => 5],
            ['product_item_id' => 18, 'variation_option_id' => 2],
            ['product_item_id' => 18, 'variation_option_id' => 6],

            // OnePlus 12
            ['product_item_id' => 19, 'variation_option_id' => 1],
            ['product_item_id' => 19, 'variation_option_id' => 5],
            ['product_item_id' => 20, 'variation_option_id' => 2],
            ['product_item_id' => 20, 'variation_option_id' => 6],

            // Asus ROG Phone 8
            ['product_item_id' => 21, 'variation_option_id' => 1],
            ['product_item_id' => 21, 'variation_option_id' => 5],
            ['product_item_id' => 22, 'variation_option_id' => 2],
            ['product_item_id' => 22, 'variation_option_id' => 6],

            // Nokia X30
            ['product_item_id' => 23, 'variation_option_id' => 1],
            ['product_item_id' => 23, 'variation_option_id' => 5],
            ['product_item_id' => 24, 'variation_option_id' => 2],
            ['product_item_id' => 24, 'variation_option_id' => 6],

            // Huawei P70 Pro
            ['product_item_id' => 25, 'variation_option_id' => 1],
            ['product_item_id' => 25, 'variation_option_id' => 5],
            ['product_item_id' => 26, 'variation_option_id' => 2],
            ['product_item_id' => 26, 'variation_option_id' => 6],

            // Tecno Camon 30
            ['product_item_id' => 27, 'variation_option_id' => 1],
            ['product_item_id' => 27, 'variation_option_id' => 5],
            ['product_item_id' => 28, 'variation_option_id' => 2],
            ['product_item_id' => 28, 'variation_option_id' => 6],

            // Infinix Zero 30
            ['product_item_id' => 29, 'variation_option_id' => 1],
            ['product_item_id' => 29, 'variation_option_id' => 5],
            ['product_item_id' => 30, 'variation_option_id' => 2],
            ['product_item_id' => 30, 'variation_option_id' => 6],

            // ZTE Nubia Z60
            ['product_item_id' => 31, 'variation_option_id' => 1],
            ['product_item_id' => 31, 'variation_option_id' => 5],
            ['product_item_id' => 32, 'variation_option_id' => 2],
            ['product_item_id' => 32, 'variation_option_id' => 6],

            // Poco F6
            ['product_item_id' => 33, 'variation_option_id' => 1],
            ['product_item_id' => 33, 'variation_option_id' => 5],
            ['product_item_id' => 34, 'variation_option_id' => 2],
            ['product_item_id' => 34, 'variation_option_id' => 6],

            // Honor Magic 6
            ['product_item_id' => 35, 'variation_option_id' => 1],
            ['product_item_id' => 35, 'variation_option_id' => 5],
            ['product_item_id' => 36, 'variation_option_id' => 2],
            ['product_item_id' => 36, 'variation_option_id' => 6],

            // Sony Xperia 1 VI
            ['product_item_id' => 37, 'variation_option_id' => 1],
            ['product_item_id' => 37, 'variation_option_id' => 5],
            ['product_item_id' => 38, 'variation_option_id' => 2],
            ['product_item_id' => 38, 'variation_option_id' => 6],

            // Motorola Edge 50 Pro
            ['product_item_id' => 39, 'variation_option_id' => 1],
            ['product_item_id' => 39, 'variation_option_id' => 5],
            ['product_item_id' => 40, 'variation_option_id' => 2],
            ['product_item_id' => 40, 'variation_option_id' => 6],

            // Xiaomi Poco X6
            ['product_item_id' => 41, 'variation_option_id' => 1],
            ['product_item_id' => 41, 'variation_option_id' => 5],
            ['product_item_id' => 42, 'variation_option_id' => 2],
            ['product_item_id' => 42, 'variation_option_id' => 6],

            // Itel S24
            ['product_item_id' => 43, 'variation_option_id' => 1],
            ['product_item_id' => 43, 'variation_option_id' => 5],
            ['product_item_id' => 44, 'variation_option_id' => 2],
            ['product_item_id' => 44, 'variation_option_id' => 6],

            // Lava Agni 3
            ['product_item_id' => 45, 'variation_option_id' => 1],
            ['product_item_id' => 45, 'variation_option_id' => 5],
            ['product_item_id' => 46, 'variation_option_id' => 2],
            ['product_item_id' => 46, 'variation_option_id' => 6],

            // Infinix GT 20
            ['product_item_id' => 47, 'variation_option_id' => 1],
            ['product_item_id' => 47, 'variation_option_id' => 5],
            ['product_item_id' => 48, 'variation_option_id' => 2],
            ['product_item_id' => 48, 'variation_option_id' => 6],

            // Realme Narzo 70
            ['product_item_id' => 49, 'variation_option_id' => 1],
            ['product_item_id' => 49, 'variation_option_id' => 5],
            ['product_item_id' => 50, 'variation_option_id' => 2],
            ['product_item_id' => 50, 'variation_option_id' => 6],

            // Vivo Y100
            ['product_item_id' => 51, 'variation_option_id' => 1],
            ['product_item_id' => 51, 'variation_option_id' => 5],
            ['product_item_id' => 52, 'variation_option_id' => 2],
            ['product_item_id' => 52, 'variation_option_id' => 6],

            // Oppo A79
            ['product_item_id' => 53, 'variation_option_id' => 1],
            ['product_item_id' => 53, 'variation_option_id' => 5],
            ['product_item_id' => 54, 'variation_option_id' => 2],
            ['product_item_id' => 54, 'variation_option_id' => 6],

            // Tecno Pova 6
            ['product_item_id' => 55, 'variation_option_id' => 1],
            ['product_item_id' => 55, 'variation_option_id' => 5],
            ['product_item_id' => 56, 'variation_option_id' => 2],
            ['product_item_id' => 56, 'variation_option_id' => 6],

            // Xiaomi 13T Pro
            ['product_item_id' => 57, 'variation_option_id' => 1],
            ['product_item_id' => 57, 'variation_option_id' => 5],
            ['product_item_id' => 58, 'variation_option_id' => 2],
            ['product_item_id' => 58, 'variation_option_id' => 6],

            // Realme GT Neo 6
            ['product_item_id' => 59, 'variation_option_id' => 1],
            ['product_item_id' => 59, 'variation_option_id' => 5],
            ['product_item_id' => 60, 'variation_option_id' => 2],
            ['product_item_id' => 60, 'variation_option_id' => 6],
        ]);

        // DB::table('product_configurations')->insert([
        //     // iPhone 15 Pro Max
        //     [ 'product_item_id' => 1, 'variation_option_id' => 1 ], // Black
        //     [ 'product_item_id' => 1, 'variation_option_id' => 5 ], // 128GB
        //     [ 'product_item_id' => 2, 'variation_option_id' => 2 ], // White
        //     [ 'product_item_id' => 2, 'variation_option_id' => 6 ], // 256GB

        //     // Samsung Galaxy S24 Ultra
        //     [ 'product_item_id' => 3, 'variation_option_id' => 1 ],
        //     [ 'product_item_id' => 3, 'variation_option_id' => 5 ],
        //     [ 'product_item_id' => 4, 'variation_option_id' => 2 ],
        //     [ 'product_item_id' => 4, 'variation_option_id' => 6 ],

        //     // Xiaomi 14 Ultra
        //     [ 'product_item_id' => 5, 'variation_option_id' => 1 ],
        //     [ 'product_item_id' => 5, 'variation_option_id' => 5 ],
        //     [ 'product_item_id' => 6, 'variation_option_id' => 2 ],
        //     [ 'product_item_id' => 6, 'variation_option_id' => 6 ],

        //     // iPhone 14 Pro Max
        //     [ 'product_item_id' => 7, 'variation_option_id' => 1 ],
        //     [ 'product_item_id' => 7, 'variation_option_id' => 5 ],
        //     [ 'product_item_id' => 8, 'variation_option_id' => 2 ],
        //     [ 'product_item_id' => 8, 'variation_option_id' => 6 ],

        //     // Samsung A55
        //     [ 'product_item_id' => 9, 'variation_option_id' => 1 ],
        //     [ 'product_item_id' => 9, 'variation_option_id' => 5 ],
        //     [ 'product_item_id' => 10, 'variation_option_id' => 2 ],
        //     [ 'product_item_id' => 10, 'variation_option_id' => 6 ],

        //     // Redmi Note 13 Pro
        //     [ 'product_item_id' => 11, 'variation_option_id' => 1 ],
        //     [ 'product_item_id' => 11, 'variation_option_id' => 5 ],
        //     [ 'product_item_id' => 12, 'variation_option_id' => 2 ],
        //     [ 'product_item_id' => 12, 'variation_option_id' => 6 ],

        //     // Oppo Reno 11 F
        //     [ 'product_item_id' => 13, 'variation_option_id' => 1 ],
        //     [ 'product_item_id' => 13, 'variation_option_id' => 5 ],
        //     [ 'product_item_id' => 14, 'variation_option_id' => 2 ],
        //     [ 'product_item_id' => 14, 'variation_option_id' => 6 ],

        //     // Vivo V30
        //     [ 'product_item_id' => 15, 'variation_option_id' => 1 ],
        //     [ 'product_item_id' => 15, 'variation_option_id' => 5 ],
        //     [ 'product_item_id' => 16, 'variation_option_id' => 2 ],
        //     [ 'product_item_id' => 16, 'variation_option_id' => 6 ],

        //     // Google Pixel 8
        //     [ 'product_item_id' => 17, 'variation_option_id' => 1 ],
        //     [ 'product_item_id' => 17, 'variation_option_id' => 5 ],
        //     [ 'product_item_id' => 18, 'variation_option_id' => 2 ],
        //     [ 'product_item_id' => 18, 'variation_option_id' => 6 ],
        // ]);
    }
}
