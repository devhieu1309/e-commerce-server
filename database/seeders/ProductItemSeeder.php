<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductItemSeeder extends Seeder
{
    public function run(): void
    {
        // https://e-commerce-server.app/storage/product_items/1762604254_SP-1-5.webp - Đen
        // https://e-commerce-server.app/storage/product_items/1762604256_SP-1-6.webp - Xanh min
        // https://e-commerce-server.app/storage/product_items/1762604256_SP-2-5.webp - Xanh lá
        // https://e-commerce-server.app/storage/product_items/1762604256_SP-2-6.webp - Hồng

        DB::table('product_items')->insert([
            // iPhone 15 Pro Max
            [
                'product_item_id' => 1,
                'product_id' => 1,
                'sku' => 'IP15PM-128GB-YELLOW',
                'price' => 31990000,
                'qty_in_stock' => 15,
                'image' => 'http://localhost:5173/230913033139-iphone-15-yellow.webp',
            ],
            // [
            //     'product_item_id' => 2,
            //     'product_id' => 1,
            //     'sku' => 'IP15PM-256GB-BLACK',
            //     'price' => 34990000,
            //     'qty_in_stock' => 10,
            //     'image' => 'https://e-commerce-server.app/storage/product_items/1762604254_SP-1-5.webp',
            // ],
            // [
            //     'product_item_id' => 61,
            //     'product_id' => 1,
            //     'sku' => 'IP15PM-256GB-GREEN',
            //     'price' => 32990000,
            //     'qty_in_stock' => 10,
            //     'image' => 'https://e-commerce-server.app/storage/product_items/1762604256_SP-2-5.webp',
            // ],
            [
                'product_item_id' => 2,
                'product_id' => 1,
                'sku' => 'IP15PM-256GB-PINK',
                'price' => 33990000,
                'qty_in_stock' => 10,
                'image' => 'https://e-commerce-server.app/storage/product_items/1762604256_SP-2-6.webp',
            ],
            [
                'product_item_id' => 61,
                'product_id' => 1,
                'sku' => 'IP15PM-256GB-BLUE',
                'price' => 37990000,
                'qty_in_stock' => 10,
                'image' => 'https://e-commerce-server.app/storage/product_items/1762604256_SP-1-6.webp',
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
                'image' => 'http://localhost:5173/220309063455-ipad-air-select-wif.webp',
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

            // Tiếp tục sau product_item_id = 18
            [
                // iPhone 14 Pro
                'product_item_id' => 19,
                'product_id' => 10,
                'sku' => 'IP14P-128GB-BLACK',
                'price' => 23990000,
                'qty_in_stock' => 20,
                'image' => 'http://localhost:5173/230913033139-iphone-15-yellow.webp',
            ],
            [
                'product_item_id' => 20,
                'product_id' => 10,
                'sku' => 'IP14P-256GB-PURPLE',
                'price' => 25990000,
                'qty_in_stock' => 15,
                'image' => 'http://localhost:5173/220608111844-thumb-macbook-pro-m-92a41cea-1766-4864-b183-14d77a6372e3-35b96841-a2ff-4f13-a7cd-916bc9912862.webp',
            ],

            [
                // Samsung Galaxy Z Fold5
                'product_item_id' => 21,
                'product_id' => 11,
                'sku' => 'ZFLD5-256GB-BLACK',
                'price' => 37990000,
                'qty_in_stock' => 12,
                'image' => 'http://localhost:5173/220309063455-ipad-air-select-wif.webp',
            ],
            [
                'product_item_id' => 22,
                'product_id' => 11,
                'sku' => 'ZFLD5-512GB-BLUE',
                'price' => 40990000,
                'qty_in_stock' => 8,
                'image' => 'http://localhost:5173/220608111844-thumb-macbook-pro-m-92a41cea-1766-4864-b183-14d77a6372e3-35b96841-a2ff-4f13-a7cd-916bc9912862.webp',
            ],

            [
                // Xiaomi 13T Pro
                'product_item_id' => 23,
                'product_id' => 12,
                'sku' => 'XM13TP-256GB-BLACK',
                'price' => 16990000,
                'qty_in_stock' => 18,
                'image' => 'http://localhost:5173/220309063455-ipad-air-select-wif.webp',
            ],
            [
                'product_item_id' => 24,
                'product_id' => 12,
                'sku' => 'XM13TP-512GB-GREEN',
                'price' => 18990000,
                'qty_in_stock' => 10,
                'image' => 'http://localhost:5173/220608111844-thumb-macbook-pro-m-92a41cea-1766-4864-b183-14d77a6372e3-35b96841-a2ff-4f13-a7cd-916bc9912862.webp',
            ],

            [
                // Oppo Find N3 Flip
                'product_item_id' => 25,
                'product_id' => 13,
                'sku' => 'OPFN3F-256GB-PINK',
                'price' => 18990000,
                'qty_in_stock' => 14,
                'image' => 'http://localhost:5173/220309063455-ipad-air-select-wif.webp',
            ],
            [
                'product_item_id' => 26,
                'product_id' => 13,
                'sku' => 'OPFN3F-512GB-BLACK',
                'price' => 20990000,
                'qty_in_stock' => 8,
                'image' => 'http://localhost:5173/220608111844-thumb-macbook-pro-m-92a41cea-1766-4864-b183-14d77a6372e3-35b96841-a2ff-4f13-a7cd-916bc9912862.webp',
            ],

            [
                // Vivo Y100
                'product_item_id' => 27,
                'product_id' => 14,
                'sku' => 'VY100-128GB-BLACK',
                'price' => 6990000,
                'qty_in_stock' => 30,
                'image' => 'http://localhost:5173/220608111844-thumb-macbook-pro-m-92a41cea-1766-4864-b183-14d77a6372e3-35b96841-a2ff-4f13-a7cd-916bc9912862.webp',
            ],
            [
                'product_item_id' => 28,
                'product_id' => 14,
                'sku' => 'VY100-256GB-BLUE',
                'price' => 7990000,
                'qty_in_stock' => 25,
                'image' => 'http://localhost:5173/220608111844-thumb-macbook-pro-m-92a41cea-1766-4864-b183-14d77a6372e3-35b96841-a2ff-4f13-a7cd-916bc9912862.webp',
            ],

            [
                // Realme GT Neo 5
                'product_item_id' => 29,
                'product_id' => 15,
                'sku' => 'GTN5-256GB-PURPLE',
                'price' => 11990000,
                'qty_in_stock' => 22,
                'image' => 'http://localhost:5173/220309063455-ipad-air-select-wif.webp',
            ],
            [
                'product_item_id' => 30,
                'product_id' => 15,
                'sku' => 'GTN5-512GB-BLACK',
                'price' => 13990000,
                'qty_in_stock' => 16,
                'image' => 'http://localhost:5173/220608111844-thumb-macbook-pro-m-92a41cea-1766-4864-b183-14d77a6372e3-35b96841-a2ff-4f13-a7cd-916bc9912862.webp',
            ],

            [
                // Asus ROG Phone 8
                'product_item_id' => 31,
                'product_id' => 16,
                'sku' => 'ROG8-256GB-BLACK',
                'price' => 25990000,
                'qty_in_stock' => 10,
                'image' => 'http://localhost:5173/220309063455-ipad-air-select-wif.webp',
            ],
            [
                'product_item_id' => 32,
                'product_id' => 16,
                'sku' => 'ROG8-512GB-WHITE',
                'price' => 27990000,
                'qty_in_stock' => 8,
                'image' => 'http://localhost:5173/220309063455-ipad-air-select-wif.webp',
            ],

            [
                // OnePlus 12
                'product_item_id' => 33,
                'product_id' => 17,
                'sku' => 'OP12-256GB-GREEN',
                'price' => 18990000,
                'qty_in_stock' => 15,
                'image' => 'http://localhost:5173/220309063455-ipad-air-select-wif.webp',
            ],
            [
                'product_item_id' => 34,
                'product_id' => 17,
                'sku' => 'OP12-512GB-BLACK',
                'price' => 20990000,
                'qty_in_stock' => 12,
                'image' => 'http://localhost:5173/220608111844-thumb-macbook-pro-m-92a41cea-1766-4864-b183-14d77a6372e3-35b96841-a2ff-4f13-a7cd-916bc9912862.webp',
            ],

            [
                // Honor Magic6 Pro
                'product_item_id' => 35,
                'product_id' => 18,
                'sku' => 'HNM6P-256GB-BLACK',
                'price' => 22990000,
                'qty_in_stock' => 10,
                'image' => 'http://localhost:5173/220309063455-ipad-air-select-wif.webp',
            ],
            [
                'product_item_id' => 36,
                'product_id' => 18,
                'sku' => 'HNM6P-512GB-GREEN',
                'price' => 24990000,
                'qty_in_stock' => 8,
                'image' => 'http://localhost:5173/220309063455-ipad-air-select-wif.webp',
            ],

            [
                // Tecno Camon 30 Pro
                'product_item_id' => 37,
                'product_id' => 19,
                'sku' => 'TC30P-128GB-BLACK',
                'price' => 5990000,
                'qty_in_stock' => 25,
                'image' => 'http://localhost:5173/220608111844-thumb-macbook-pro-m-92a41cea-1766-4864-b183-14d77a6372e3-35b96841-a2ff-4f13-a7cd-916bc9912862.webp',
            ],
            [
                'product_item_id' => 38,
                'product_id' => 19,
                'sku' => 'TC30P-256GB-BLUE',
                'price' => 6990000,
                'qty_in_stock' => 18,
                'image' => 'http://localhost:5173/220309063455-ipad-air-select-wif.webp',
            ],

            [
                // Infinix Zero 30
                'product_item_id' => 39,
                'product_id' => 20,
                'sku' => 'IFZ30-128GB-GOLD',
                'price' => 6990000,
                'qty_in_stock' => 22,
                'image' => 'http://localhost:5173/220309063455-ipad-air-select-wif.webp',
            ],
            [
                'product_item_id' => 40,
                'product_id' => 20,
                'sku' => 'IFZ30-256GB-BLACK',
                'price' => 7990000,
                'qty_in_stock' => 16,
                'image' => 'http://localhost:5173/220608111844-thumb-macbook-pro-m-92a41cea-1766-4864-b183-14d77a6372e3-35b96841-a2ff-4f13-a7cd-916bc9912862.webp',
            ],

            [
                // iPhone 13
                'product_item_id' => 41,
                'product_id' => 21,
                'sku' => 'IP13-128GB-BLUE',
                'price' => 16990000,
                'qty_in_stock' => 25,
                'image' => 'http://localhost:5173/220309063455-ipad-air-select-wif.webp',
            ],
            [
                'product_item_id' => 42,
                'product_id' => 21,
                'sku' => 'IP13-256GB-BLACK',
                'price' => 18990000,
                'qty_in_stock' => 15,
                'image' => 'http://localhost:5173/220309063455-ipad-air-select-wif.webp',
            ],

            [
                // Samsung Galaxy M14
                'product_item_id' => 43,
                'product_id' => 22,
                'sku' => 'M14-128GB-BLUE',
                'price' => 4490000,
                'qty_in_stock' => 40,
                'image' => 'http://localhost:5173/220608111844-thumb-macbook-pro-m-92a41cea-1766-4864-b183-14d77a6372e3-35b96841-a2ff-4f13-a7cd-916bc9912862.webp',
            ],
            [
                'product_item_id' => 44,
                'product_id' => 22,
                'sku' => 'M14-128GB-GRAY',
                'price' => 4490000,
                'qty_in_stock' => 35,
                'image' => 'http://localhost:5173/220309063455-ipad-air-select-wif.webp',
            ],

            [
                // Xiaomi Poco F5 Pro
                'product_item_id' => 45,
                'product_id' => 23,
                'sku' => 'PF5P-256GB-BLACK',
                'price' => 11990000,
                'qty_in_stock' => 18,
                'image' => 'http://localhost:5173/220309063455-ipad-air-select-wif.webp',
            ],
            [
                'product_item_id' => 46,
                'product_id' => 23,
                'sku' => 'PF5P-512GB-WHITE',
                'price' => 13990000,
                'qty_in_stock' => 12,
                'image' => 'http://localhost:5173/220608111844-thumb-macbook-pro-m-92a41cea-1766-4864-b183-14d77a6372e3-35b96841-a2ff-4f13-a7cd-916bc9912862.webp',
            ],

            [
                // Oppo A79 5G
                'product_item_id' => 47,
                'product_id' => 24,
                'sku' => 'OPA79-128GB-BLACK',
                'price' => 6290000,
                'qty_in_stock' => 30,
                'image' => 'http://localhost:5173/220309063455-ipad-air-select-wif.webp',
            ],
            [
                'product_item_id' => 48,
                'product_id' => 24,
                'sku' => 'OPA79-256GB-PURPLE',
                'price' => 7290000,
                'qty_in_stock' => 25,
                'image' => 'http://localhost:5173/220309063455-ipad-air-select-wif.webp',
            ],

            [
                // Vivo Y36
                'product_item_id' => 49,
                'product_id' => 25,
                'sku' => 'VY36-128GB-BLACK',
                'price' => 5990000,
                'qty_in_stock' => 30,
                'image' => 'http://localhost:5173/220309063455-ipad-air-select-wif.webp',
            ],
            [
                'product_item_id' => 50,
                'product_id' => 25,
                'sku' => 'VY36-256GB-GOLD',
                'price' => 6790000,
                'qty_in_stock' => 20,
                'image' => 'http://localhost:5173/230913033139-iphone-15-yellow.webp',
            ],

            [
                // Realme C67
                'product_item_id' => 51,
                'product_id' => 26,
                'sku' => 'RC67-128GB-BLACK',
                'price' => 4990000,
                'qty_in_stock' => 35,
                'image' => 'http://localhost:5173/230913060526-iphone-15-pro-max-n-1-59f45888-19c4-48c6-9803-1d3828deeba9-eab63bca-5bbf-4dc6-ac81-6b49a59aadf2.webp',
            ],
            [
                'product_item_id' => 52,
                'product_id' => 26,
                'sku' => 'RC67-256GB-GREEN',
                'price' => 5790000,
                'qty_in_stock' => 28,
                'image' => 'http://localhost:5173/230913033139-iphone-15-yellow.webp',
            ],

            [
                // Asus Zenfone 10
                'product_item_id' => 53,
                'product_id' => 27,
                'sku' => 'ZF10-256GB-BLACK',
                'price' => 17990000,
                'qty_in_stock' => 10,
                'image' => 'http://localhost:5173/230913060526-iphone-15-pro-max-n-1-59f45888-19c4-48c6-9803-1d3828deeba9-eab63bca-5bbf-4dc6-ac81-6b49a59aadf2.webp',
            ],
            [
                'product_item_id' => 54,
                'product_id' => 27,
                'sku' => 'ZF10-512GB-GREEN',
                'price' => 19990000,
                'qty_in_stock' => 8,
                'image' => 'http://localhost:5173/220608111844-thumb-macbook-pro-m-92a41cea-1766-4864-b183-14d77a6372e3-35b96841-a2ff-4f13-a7cd-916bc9912862.webp',
            ],

            [
                // Nothing Phone (2)
                'product_item_id' => 55,
                'product_id' => 28,
                'sku' => 'NP2-256GB-BLACK',
                'price' => 17990000,
                'qty_in_stock' => 15,
                'image' => 'http://localhost:5173/230913033139-iphone-15-yellow.webp',
            ],
            [
                'product_item_id' => 56,
                'product_id' => 28,
                'sku' => 'NP2-512GB-WHITE',
                'price' => 19990000,
                'qty_in_stock' => 10,
                'image' => 'http://localhost:5173/230913060526-iphone-15-pro-max-n-1-59f45888-19c4-48c6-9803-1d3828deeba9-eab63bca-5bbf-4dc6-ac81-6b49a59aadf2.webp',
            ],

            [
                // Huawei P60 Pro
                'product_item_id' => 57,
                'product_id' => 29,
                'sku' => 'HP60P-256GB-BLACK',
                'price' => 19990000,
                'qty_in_stock' => 10,
                'image' => 'http://localhost:5173/230913060526-iphone-15-pro-max-n-1-59f45888-19c4-48c6-9803-1d3828deeba9-eab63bca-5bbf-4dc6-ac81-6b49a59aadf2.webp',
            ],
            [
                'product_item_id' => 58,
                'product_id' => 29,
                'sku' => 'HP60P-512GB-WHITE',
                'price' => 22990000,
                'qty_in_stock' => 8,
                'image' => 'http://localhost:5173/230913033139-iphone-15-yellow.webp',
            ],

            [
                // Motorola Edge 40
                'product_item_id' => 59,
                'product_id' => 30,
                'sku' => 'ME40-256GB-BLACK',
                'price' => 10990000,
                'qty_in_stock' => 18,
                'image' => 'http://localhost:5173/230913060526-iphone-15-pro-max-n-1-59f45888-19c4-48c6-9803-1d3828deeba9-eab63bca-5bbf-4dc6-ac81-6b49a59aadf2.webp',
            ],
            [
                'product_item_id' => 60,
                'product_id' => 30,
                'sku' => 'ME40-256GB-BLACK',
                'price' => 10990000,
                'qty_in_stock' => 18,
                'image' => 'http://localhost:5173/230913060526-iphone-15-pro-max-n-1-59f45888-19c4-48c6-9803-1d3828deeba9-eab63bca-5bbf-4dc6-ac81-6b49a59aadf2.webp',
            ],
        ]);
    }
}
