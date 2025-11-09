<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProvinceSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('provinces')->truncate();

        $json = file_get_contents(database_path('data/provinces.json'));
        $provinces = json_decode($json, true);

        // 🔧 Loại bỏ cột 'districts' trước khi insert
        $data = array_map(function ($province) {
            unset($province['districts']); // ❌ bỏ phần này đi vì bảng provinces không có cột đó
            return $province;
        }, $provinces);

        DB::table('provinces')->insert($data);

        Schema::enableForeignKeyConstraints();
    }
}
