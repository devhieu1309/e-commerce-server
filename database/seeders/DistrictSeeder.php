<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DistrictSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('districts')->truncate();

        $json = file_get_contents(database_path('data/districts.json'));
        $districts = json_decode($json, true);

        $data = [];

        foreach ($districts as $district) {
            // Tìm tỉnh có mã code trùng với province_code
            $province = Province::where('code', $district['province_code'])->first();

            if ($province) {
                $data[] = [
                    'provinces_id' => $province->provinces_id,
                    'name' => $district['name'],
                    'code' => $district['code'],
                ];
            }
        }

        DB::table('districts')->insert($data);
        Schema::enableForeignKeyConstraints();
    }
}
