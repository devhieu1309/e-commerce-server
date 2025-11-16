<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ward;
use Illuminate\Support\Facades\DB;

class WardSeeder extends Seeder
{
    public function run()
    {
        $sqlPath = database_path('wards.sql');
        $sql = file_get_contents($sqlPath);
        DB::unprepared($sql);
    }
}
