<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $addresses = [
            [
                'detailed_address' => '12 Phan Đình Phùng',
                'provinces_id' => '01',   
                'wards_id' => '00004',
            ],
            [
                'detailed_address' => '23 Lê Lợi',
                'provinces_id' => '20',   
                'wards_id' => '06172',   
            ],
            [
                'detailed_address' => '56 Nguyễn Văn Cừ',
                'provinces_id' => '92',      
                'wards_id' => '31135',       
            ],
            [
                'detailed_address' => '89 Trần Phú',
                'provinces_id' => '48',     
                'wards_id' => '20242',       
            ],
            
            [
                'detailed_address' => '77 Nguyễn Tất Thành',
                'provinces_id' => '42',     
                'wards_id' => '18100',       
            ],
        ];

        foreach ($addresses as $address) {
            Address::create([
                'detailed_address' => $address['detailed_address'],
                'provinces_id' => $address['provinces_id'],
                'wards_id' => $address['wards_id'],
            ]);
        }
    }
}
