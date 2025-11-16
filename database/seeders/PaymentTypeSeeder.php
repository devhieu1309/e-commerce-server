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
            ['payment_type_id' => 1, 'value' => 'Tiền mặt'],
            ['payment_type_id' => 2, 'value' => 'COD'],
            ['payment_type_id' => 3, 'value' => 'VNPay'],
            ['payment_type_id' => 4, 'value' => 'Momo'],
        ];

        foreach ($paymentType as $item) {
            PaymentType::create($item);
        }

    }
}
