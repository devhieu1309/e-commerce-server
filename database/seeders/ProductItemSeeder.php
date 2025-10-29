<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductItemSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('product_items')->insert([
            // iPhone 15 Pro Max
            [
                'product_item_id' => 1,
                'product_id' => 1,
                'sku' => 'IP15PM-128GB-BLACK',
                'price' => 31990000,
                'qty_in_stock' => 15,
                'image' => 'http://localhost:5173/230913033139-iphone-15-yellow.webp',
            ],
            [
                'product_item_id' => 2,
                'product_id' => 1,
                'sku' => 'IP15PM-256GB-WHITE',
                'price' => 34990000,
                'qty_in_stock' => 10,
                'image' => 'http://localhost:5173/230913060526-iphone-15-pro-max-n-1-59f45888-19c4-48c6-9803-1d3828deeba9-eab63bca-5bbf-4dc6-ac81-6b49a59aadf2.webp',
            ],

            // Samsung Galaxy S24 Ultra
            [
                'product_item_id' => 3,
                'product_id' => 2,
                'sku' => 'S24U-256GB-BLACK',
                'price' => 28990000,
                'qty_in_stock' => 20,
                'image' => 'http://localhost:5173/220608111844-thumb-macbook-pro-m-92a41cea-1766-4864-b183-14d77a6372e3-35b96841-a2ff-4f13-a7cd-916bc9912862.webp',
            ],
            [
                'product_item_id' => 4,
                'product_id' => 2,
                'sku' => 'S24U-512GB-WHITE',
                'price' => 31990000,
                'qty_in_stock' => 15,
                'image' => 'http://localhost:5173/221019094952-minhtuanmobile-ipad-08f8a086-4310-441b-a594-f2766853f14e.webp',
            ],

            // Xiaomi 14 Ultra
            [
                'product_item_id' => 5,
                'product_id' => 3,
                'sku' => 'XM14U-256GB-BLACK',
                'price' => 22990000,
                'qty_in_stock' => 25,
                'image' => 'http://localhost:5173/220309063455-ipad-air-select-wif.webp',
            ],
            [
                'product_item_id' => 6,
                'product_id' => 3,
                'sku' => 'XM14U-512GB-WHITE',
                'price' => 25990000,
                'qty_in_stock' => 20,
                'image' => 'http://localhost:5173/mbprom3-2310310143271-2310311343-075912c4-d9a2-4f18-a430-899faded17ec.webp',
            ],

            // iPhone 14 Pro Max
            [
                'product_item_id' => 7,
                'product_id' => 4,
                'sku' => 'IP14PM-128GB-BLACK',
                'price' => 25990000,
                'qty_in_stock' => 15,
                'image' => 'http://localhost:5173/230913033139-iphone-15-yellow.webp',
            ],
            [
                'product_item_id' => 8,
                'product_id' => 4,
                'sku' => 'IP14PM-256GB-WHITE',
                'price' => 27990000,
                'qty_in_stock' => 10,
                'image' => 'https://cdn.tgdd.vn/Products/Images/42/303888/iphone-14-pro-max-white-thumb-600x600.jpg',
            ],

            // Samsung Galaxy A55
            [
                'product_item_id' => 9,
                'product_id' => 5,
                'sku' => 'A55-128GB-BLACK',
                'price' => 10990000,
                'qty_in_stock' => 30,
                'image' => 'http://localhost:5173/mbprom3-2310310143271-2310311343-075912c4-d9a2-4f18-a430-899faded17ec.webp',
            ],
            [
                'product_item_id' => 10,
                'product_id' => 5,
                'sku' => 'A55-256GB-WHITE',
                'price' => 11990000,
                'qty_in_stock' => 20,
                'image' => 'http://localhost:5173/230913033139-iphone-15-yellow.webp',
            ],

            // Xiaomi Redmi Note 13 Pro
            [
                'product_item_id' => 11,
                'product_id' => 6,
                'sku' => 'RN13P-128GB-BLACK',
                'price' => 7990000,
                'qty_in_stock' => 25,
                'image' => 'http://localhost:5173/220608111844-thumb-macbook-pro-m-92a41cea-1766-4864-b183-14d77a6372e3-35b96841-a2ff-4f13-a7cd-916bc9912862.webp',
            ],
            [
                'product_item_id' => 12,
                'product_id' => 6,
                'sku' => 'RN13P-256GB-WHITE',
                'price' => 8990000,
                'qty_in_stock' => 20,
                'image' => 'http://localhost:5173/230913033139-iphone-15-yellow.webp',
            ],

            // Oppo Reno 11 F
            [
                'product_item_id' => 13,
                'product_id' => 7,
                'sku' => 'OPR11F-128GB-BLACK',
                'price' => 8490000,
                'qty_in_stock' => 25,
                'image' => 'http://localhost:5173/mbprom3-2310310143271-2310311343-075912c4-d9a2-4f18-a430-899faded17ec.webp',
            ],
            [
                'product_item_id' => 14,
                'product_id' => 7,
                'sku' => 'OPR11F-256GB-WHITE',
                'price' => 9490000,
                'qty_in_stock' => 15,
                'image' => 'http://localhost:5173/220608111844-thumb-macbook-pro-m-92a41cea-1766-4864-b183-14d77a6372e3-35b96841-a2ff-4f13-a7cd-916bc9912862.webp',
            ],

            // Vivo V30
            [
                'product_item_id' => 15,
                'product_id' => 8,
                'sku' => 'V30-128GB-BLACK',
                'price' => 9990000,
                'qty_in_stock' => 20,
                'image' => 'http://localhost:5173/230913033139-iphone-15-yellow.webp',
            ],
            [
                'product_item_id' => 16,
                'product_id' => 8,
                'sku' => 'V30-256GB-WHITE',
                'price' => 10990000,
                'qty_in_stock' => 15,
                'image' => 'http://localhost:5173/230913033139-iphone-15-yellow.webp',
            ],

            // Google Pixel 8
            [
                'product_item_id' => 17,
                'product_id' => 9,
                'sku' => 'PIX8-128GB-BLACK',
                'price' => 16990000,
                'qty_in_stock' => 18,
                'image' => 'http://localhost:5173/230913033139-iphone-15-yellow.webp',
            ],
            [
                'product_item_id' => 18,
                'product_id' => 9,
                'sku' => 'PIX8-256GB-WHITE',
                'price' => 18990000,
                'qty_in_stock' => 10,
                'image' => 'http://localhost:5173/230913033139-iphone-15-yellow.webp',
            ],

            // Realme 12+
            [
                'product_item_id' => 19,
                'product_id' => 10,
                'sku' => 'RM12P-128GB-BLACK',
                'price' => 7990000,
                'qty_in_stock' => 20,
                'image' => 'http://localhost:5173/230913033139-iphone-15-yellow.webp',
            ],
            [
                'product_item_id' => 20,
                'product_id' => 10,
                'sku' => 'RM12P-256GB-WHITE',
                'price' => 8990000,
                'qty_in_stock' => 15,
                'image' => 'http://localhost:5173/230913033139-iphone-15-yellow.webp',
            ],
        ]);
    }
}
