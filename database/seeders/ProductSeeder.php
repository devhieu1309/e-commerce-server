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
                'name' => 'Iphone 15',
                
            ],
            [
                'name' => 'Samsung Galaxy S23',
                
            ],
            [
                'name' => 'Xiaomi Mi 13',
                
            ],
            [
                'name' => 'OnePlus 11',
                
            ],
            [
                'name' => 'Google Pixel 7',
                
            ],
        ];

        foreach ($products as $product) {
            Product::create([
                'name' => $product['name'],
            ]);
        }
    }
}
