<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        //  Tạm tắt kiểm tra khóa ngoại để tránh lỗi truncate
        Schema::disableForeignKeyConstraints();

        DB::table('countries')->truncate();

        //  Thêm dữ liệu quốc gia thật (ví dụ từ file JSON)
        $json = file_get_contents(database_path('data/countries.json'));
        $countries = json_decode($json, true);

        DB::table('countries')->insert($countries);

        //  Bật lại khóa ngoại
        Schema::enableForeignKeyConstraints();
    }
}
