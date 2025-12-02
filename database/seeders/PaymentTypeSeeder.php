<?php

namespace Database\Seeders;

use App\Models\PaymentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paymentType = [
            ['payment_type_id' => 1, 'value' => 'Tiền mặt', 'image' => 'tienmat.jpg'],
            ['payment_type_id' => 2, 'value' => 'COD', 'image' => 'cod.jpg'],
            ['payment_type_id' => 3, 'value' => 'VNPay', 'image' => 'vnpay.jpg'],
            ['payment_type_id' => 4, 'value' => 'Momo', 'image' => 'momo.jpg'],
        ];

        foreach ($paymentType as $item) {
            PaymentType::create($item);
        }
    }
}
