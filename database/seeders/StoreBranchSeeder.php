<?php

namespace Database\Seeders;

use App\Models\Address;
use App\Models\StoreBranch;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Str;

class StoreBranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // StoreBranch::factory(10)->create();

        $faker = Faker::create();

        // Danh sách link Google Maps tương ứng với từng địa chỉ trong AddressSeeder
        $mapLinks = [
            'https://maps.app.goo.gl/9DCb2R1H95Bqg3yC7', // 12 Phan Đình Phùng
            'https://maps.app.goo.gl/Xkd2NwKi2gSdGYNU9', // 23 Lê Lợi
            'https://maps.app.goo.gl/dx1ZZVTgSuaaKWSa9', // 56 Nguyễn Văn Cừ
            'https://maps.app.goo.gl/5LcuP1t2Yv1AxztBA', // 89 Trần Phú
            'https://maps.app.goo.gl/acfECtVLJ2NA6JpQ9', // 77 Nguyễn Tất Thành
        ];

        // Lấy tất cả các địa chỉ có trong bảng Address
        $addresses = Address::all();

        foreach ($addresses as $index => $address) {
            DB::table('store_branches')->insert([
                'name' => 'DracoPhone - CN ' . $address->detailed_address,
                'phone_number' => $faker->numerify('09########'),
                'email' => Str::random(8) . '@dracophone.vn',
                'opening_hours' => '08:00 - 21:00',
                'address_id' => $address->address_id,
                'map_link' => $mapLinks[$index] ?? $faker->url(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
