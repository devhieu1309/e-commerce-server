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
                'status' => 'Thanh Toán MOMO',
            ],
            [
                'status' => 'Thanh Toán VN Pay',
            ],
            [
                'status' => 'Thanh Toán Tiền Mặt',
            ],


        ];

        foreach ($orderStatues as $orderStatus) {
            Order_Status::create([
                'status' => $orderStatus['status'],

            ]);
        }
    }
}
