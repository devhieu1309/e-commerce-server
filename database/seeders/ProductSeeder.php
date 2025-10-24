<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'product_name' => 'Iphone 15',
                
            ],
            [
                'product_name' => 'Samsung Galaxy S23',
                
            ],
            [
                'product_name' => 'Xiaomi Mi 13',
                
            ],
            [
                'product_name' => 'OnePlus 11',
                
            ],
            [
                'product_name' => 'Google Pixel 7',
                
            ],
        ];

        foreach ($products as $product) {
            Product::create([
                'product_name' => $product['product_name'],
            ]);
        }
    }
}
