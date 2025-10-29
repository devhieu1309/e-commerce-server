<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DistrictSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('data/districts.json');

        if (!file_exists($path)) {
            $this->command->warn('⚠️ districts.json not found — skipping.');
            return;
        }

        $data = json_decode(file_get_contents($path), true);

        // Tạo map code -> ID thật trong bảng provinces
        $provinceMap = DB::table('provinces')->pluck('id', 'name')->toArray();

        foreach ($data as $code => $district) {
            // Lấy tên tỉnh mà quận này thuộc về
            $provinceName = $this->getProvinceName($district['parent_code']);

            // Nếu tìm thấy tỉnh tương ứng, lấy ID thật
            $provinceId = DB::table('provinces')
                ->where('full_name', 'like', '%' . $provinceName . '%')
                ->value('id');

            DB::table('districts')->insert([
                'name' => $district['name'],
                'full_name' => $district['full_name'] ?? $district['name'],
                'province_id' => $provinceId,
            ]);
        }

        $this->command->info('✅ Seeded districts successfully.');
    }

    // Hàm lấy tên tỉnh từ mã parent_code
    private function getProvinceName($parentCode)
    {
        $provinces = json_decode(file_get_contents(database_path('data/provinces.json')), true);
        return $provinces[$parentCode]['name'] ?? null;
    }
}
