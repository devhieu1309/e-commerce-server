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
                'description' => 'Điện thoại cao cấp mới nhất của Apple',
                'image' => 'iphone15.jpg',
            ],
            [
                'product_name' => 'Samsung Galaxy S23',
                'description' => 'Flagship mạnh mẽ của Samsung',
                'image' => 'galaxy_s23.jpg',
            ],
            [
                'product_name' => 'Xiaomi Mi 13',
                'description' => 'Hiệu năng cao, giá hợp lý từ Xiaomi',
                'image' => 'mi13.jpg',
            ],
            [
                'product_name' => 'OnePlus 11',
                'description' => 'Thiết kế đẹp, hiệu năng mạnh mẽ',
                'image' => 'oneplus11.jpg',
            ],
            [
                'product_name' => 'Google Pixel 7',
                'description' => 'Camera xuất sắc, Android gốc',
                'image' => 'pixel7.jpg',
            ],
        ];


        foreach ($products as $product) {
            Product::create([
                'product_name' => $product['product_name'],
                'description' => $product['description'],
                'image' => $product['image'],
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
