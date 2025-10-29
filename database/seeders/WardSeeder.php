<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WardSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('data/wards.json');

        if (!file_exists($path)) {
            $this->command->warn('⚠️ wards.json not found — skipping.');
            return;
        }

        $data = json_decode(file_get_contents($path), true);

        // Tạo map code -> ID thật trong bảng districts
        $districtMap = DB::table('districts')->pluck('id', 'name')->toArray();

        foreach ($data as $code => $ward) {
            // Lấy tên huyện mà phường này thuộc về
            $districtName = $this->getDistrictName($ward['parent_code']);

            // Tìm ID thật trong bảng districts
            $districtId = DB::table('districts')
                ->where('full_name', 'like', '%' . $districtName . '%')
                ->value('id');

            DB::table('wards')->insert([
                'name' => $ward['name'],
                'full_name' => $ward['full_name'] ?? $ward['name'],
                'district_id' => $districtId,
            ]);
        }

        $this->command->info('✅ Seeded wards successfully.');
    }

    // Hàm lấy tên quận/huyện từ mã parent_code
    private function getDistrictName($parentCode)
    {
        $districts = json_decode(file_get_contents(database_path('data/districts.json')), true);
        return $districts[$parentCode]['name'] ?? null;
    }
}
