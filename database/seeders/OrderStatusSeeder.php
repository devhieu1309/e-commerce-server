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
                'status' => 'Đang chờ xử lý',
            ],
            [
                'status' => 'Đang chuẩn bị hàng',
            ],
            [
                'status' => 'Đã xác nhận đơn hàng',
            ],
            [
                'status' => 'Đang vận chuyển',
            ],
            [
                'status' => 'Đang giao hàng',
            ],
            [
                'status' => 'Đang ở đơn vị vận chuyển',
            ],
            [
                'status' => 'Đã giao hàng',
            ],
            [
                'status' => 'Đã hủy đơn hàng',
            ],
            [
                'status' => 'Hoàn trả hàng',
            ],
            [
                'status' => 'Giao hàng không thành công',
            ],
            [
                'status' => 'Đơn hàng bị từ chối',
            ],
            [
                'status' => 'Đã trả hàng thành công',
            ],
            [
                'status' => 'Đơn hàng bị hủy bởi hệ thống',
            ],

        ];

        foreach ($orderStatues as $orderStatus) {
            Order_Status::create([
                'status' => $orderStatus['status'],

            ]);
        }
    }
}
