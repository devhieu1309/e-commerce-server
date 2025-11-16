<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Order_Status;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $orderStatues = [
            [
                'status' => 'Chờ xác nhận',
            ],
            [
                'status' => 'Đã xác nhận',
            ],
            [
                'status' => 'Chờ lấy hàng',
            ],
            [
                'status' => 'Chờ giao hàng',
            ],
            [
                'status' => 'Đã giao',
            ],
            [
                'status' => 'Trả hàng',
            ],
            [
                'status' => 'Hủy đơn',
            ],

            
        ];

        foreach ($orderStatues as $orderStatus) {
            Order_Status::create([
                'status' => $orderStatus['status'],

            ]);
        }
    }
}
