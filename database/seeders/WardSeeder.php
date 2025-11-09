<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class WardSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('wards')->truncate();

        $json = file_get_contents(database_path('data/wards.json'));
        $wards = json_decode($json, true);

        $data = [];

        foreach ($wards as $ward) {
            $district = District::where('code', $ward['district_code'])->first();

            if ($district) {
                $data[] = [
                    'districts_id' => $district->districts_id,
                    'name' => $ward['name'],
                    'code' => $ward['code'],
                ];
            }
        }

        DB::table('wards')->insert($data);
        Schema::enableForeignKeyConstraints();
    }
}
