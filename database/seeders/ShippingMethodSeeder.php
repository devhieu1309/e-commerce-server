<?php

namespace Database\Seeders;

use App\Models\ShippingMethod;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shipping_methods = [
            [
                'name' => 'Giao hàng tiêu chuẩn',
                'price' => 30000,
            ],
            [
                'name' => 'Giao nhanh',
                'price' => 60000,
            ],
            [
                'name' => 'Nhận tại cửa hàng',
                'price' => 0,
            ],
            
        ];

        foreach ($shipping_methods as $shipping_method) {
            ShippingMethod::create([
                'shipping_method_name' => $shipping_method['name'],
                'shipping_method_price' => $shipping_method['price'],
            ]);
        }
    }
}
