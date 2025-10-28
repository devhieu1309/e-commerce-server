<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Province;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    public function run()
    {
        // $provinces = [
        //     ['provinces_id' => '01', 'name' => 'Hà Nội', 'full_name' => 'Thành phố Hà Nội'],
        //     ['provinces_id' => '04', 'name' => 'Cao Bằng', 'full_name' => 'Tỉnh Cao Bằng'],
        //     ['provinces_id' => '08', 'name' => 'Tuyên Quang', 'full_name' => 'Tỉnh Tuyên Quang'],
        //     ['provinces_id' => '11', 'name' => 'Điện Biên', 'full_name' => 'Tỉnh Điện Biên'],
        //     ['provinces_id' => '12', 'name' => 'Lai Châu', 'full_name' => 'Tỉnh Lai Châu'],
        //     ['provinces_id' => '14', 'name' => 'Sơn La', 'full_name' => 'Tỉnh Sơn La'],
        //     ['provinces_id' => '15', 'name' => 'Lào Cai', 'full_name' => 'Tỉnh Lào Cai'],
        //     ['provinces_id' => '19', 'name' => 'Thái Nguyên', 'full_name' => 'Tỉnh Thái Nguyên'],
        //     ['provinces_id' => '20', 'name' => 'Lạng Sơn', 'full_name' => 'Tỉnh Lạng Sơn'],
        //     ['provinces_id' => '22', 'name' => 'Quảng Ninh', 'full_name' => 'Tỉnh Quảng Ninh'],
        //     ['provinces_id' => '24', 'name' => 'Bắc Ninh', 'full_name' => 'Tỉnh Bắc Ninh'],
        //     ['provinces_id' => '25', 'name' => 'Phú Thọ', 'full_name' => 'Tỉnh Phú Thọ'],
        //     ['provinces_id' => '31', 'name' => 'Hải Phòng', 'full_name' => 'Thành phố Hải Phòng'],
        //     ['provinces_id' => '33', 'name' => 'Hưng Yên', 'full_name' => 'Tỉnh Hưng Yên'],
        //     ['provinces_id' => '37', 'name' => 'Ninh Bình', 'full_name' => 'Tỉnh Ninh Bình'],
        //     ['provinces_id' => '38', 'name' => 'Thanh Hóa', 'full_name' => 'Tỉnh Thanh Hóa'],
        //     ['provinces_id' => '40', 'name' => 'Nghệ An', 'full_name' => 'Tỉnh Nghệ An'],
        //     ['provinces_id' => '42', 'name' => 'Hà Tĩnh', 'full_name' => 'Tỉnh Hà Tĩnh'],
        //     ['provinces_id' => '44', 'name' => 'Quảng Trị', 'full_name' => 'Tỉnh Quảng Trị'],
        //     ['provinces_id' => '46', 'name' => 'Huế', 'full_name' => 'Thành phố Huế'],
        //     ['provinces_id' => '48', 'name' => 'Đà Nẵng', 'full_name' => 'Thành phố Đà Nẵng'],
        //     ['provinces_id' => '51', 'name' => 'Quảng Ngãi', 'full_name' => 'Tỉnh Quảng Ngãi'],
        //     ['provinces_id' => '52', 'name' => 'Gia Lai', 'full_name' => 'Tỉnh Gia Lai'],
        //     ['provinces_id' => '56', 'name' => 'Khánh Hòa', 'full_name' => 'Tỉnh Khánh Hòa'],
        //     ['provinces_id' => '66', 'name' => 'Đắk Lắk', 'full_name' => 'Tỉnh Đắk Lắk'],
        //     ['provinces_id' => '68', 'name' => 'Lâm Đồng', 'full_name' => 'Tỉnh Lâm Đồng'],
        //     ['provinces_id' => '75', 'name' => 'Đồng Nai', 'full_name' => 'Tỉnh Đồng Nai'],
        //     ['provinces_id' => '79', 'name' => 'Hồ Chí Minh', 'full_name' => 'Thành phố Hồ Chí Minh'],
        //     ['provinces_id' => '80', 'name' => 'Tây Ninh', 'full_name' => 'Tỉnh Tây Ninh'],
        //     ['provinces_id' => '82', 'name' => 'Đồng Tháp', 'full_name' => 'Tỉnh Đồng Tháp'],
        //     ['provinces_id' => '86', 'name' => 'Vĩnh Long', 'full_name' => 'Tỉnh Vĩnh Long'],
        //     ['provinces_id' => '91', 'name' => 'An Giang', 'full_name' => 'Tỉnh An Giang'],
        //     ['provinces_id' => '92', 'name' => 'Cần Thơ', 'full_name' => 'Thành phố Cần Thơ'],
        //     ['provinces_id' => '96', 'name' => 'Cà Mau', 'full_name' => 'Tỉnh Cà Mau'],
        // ];

        // foreach ($provinces as $prov) {
        //     Province::updateOrCreate(
        //         ['provinces_id' => $prov['provinces_id']],
        //         [
        //             'name' => $prov['name'],
        //             'full_name' => $prov['full_name'],
        //         ]
        //     );
        // }

        $sqlPath = database_path('provinces.sql'); 
        DB::unprepared(file_get_contents($sqlPath));
    }
}
