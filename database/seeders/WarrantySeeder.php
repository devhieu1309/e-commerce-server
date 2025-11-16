<?php

namespace Database\Seeders;

use App\Models\Warranty;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class WarrantySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();

        for ($i = 1; $i <= 12; $i++) {
            DB::table('warranty')->insert([
                'serial_number'    => strtoupper($faker->bothify('SN###??')),
                'warranty_status'  => $faker->randomElement(['Còn bảo hành', 'Hết hạn bảo hành']),
                'warranty_start'   => $faker->date('Y-m-d', 'now'),
                'warranty_expiry'  => $faker->date('Y-m-d', '+1 years'),
                'branch'           => $faker->company(),
                'description'      => $faker->sentence(6),
                'product_id'       => $faker->numberBetween(1, 5),
                'created_at'       => now(),
                'updated_at'       => now(),
            ]);
        }
    }
}
