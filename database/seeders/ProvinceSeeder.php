<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinceSeeder extends Seeder
{
    public function run(): void
    {
        $path = database_path('data/provinces.json');

        if (!file_exists($path)) {
            $this->command->warn('⚠️ provinces.json not found — skipping.');
            return;
        }

        $data = json_decode(file_get_contents($path), true);

        foreach ($data as $code => $province) {
            DB::table('provinces')->insert([
                'name' => $province['name'],
                'full_name' => $province['full_name'] ?? $province['name'],
            ]);
        }

        $this->command->info('✅ Seeded provinces successfully.');
    }
}
