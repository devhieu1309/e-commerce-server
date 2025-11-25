<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Xóa dữ liệu cũ nhưng không dùng TRUNCATE (gây lỗi FK)
        User::query()->delete();

        // Reset lại auto increment nếu cần
        // (chỉ chạy được khi bảng users không bị ràng buộc)
        // \DB::statement("ALTER TABLE users AUTO_INCREMENT = 1");

        // Tạo tài khoản Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin',
            'phone' => '0000000000',
            'role' => 'admin',
            'password' => Hash::make('admin123'),
        ]);

        User::create([
            'name' => 'Kỳ Bùi',
            'email' => 'kybui09@gmail.com',
            'phone' => '0123456789',
            'role' => 'user',
            'password' => Hash::make('kybui123'),
        ]);
    }
}
