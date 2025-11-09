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
                'provinces_id' => '01',   //Hà Nội
                'wards_id' => '00004', //Phường Ba Đình
            ],
            [
                'detailed_address' => '23 Lê Lợi',
                'provinces_id' => '20',   //Lạng Sơn
                'wards_id' => '06172', //Xã Hoàng Văn Thụ  
            ],
            [
                'detailed_address' => '56 Nguyễn Văn Cừ',
                'provinces_id' => '92', //Cần Thơ      
                'wards_id' => '31135',    //Phường Ninh Kiều   
            ],
            [
                'detailed_address' => '89 Trần Phú',
                'provinces_id' => '48', //Đà Nẵng    
                'wards_id' => '20242', //Phường Hải Châu       
            ],
            
            [
                'detailed_address' => '77 Nguyễn Tất Thành',
                'provinces_id' => '42', //Hà Tĩnh     
                'wards_id' => '18100', //Phường Trần Phú       
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
