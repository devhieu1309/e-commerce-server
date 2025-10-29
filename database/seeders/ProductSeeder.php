<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('products')->insert([
            [
                'product_name' => 'iPhone 15 Pro Max',
                'description' => 'Flagship mới nhất của Apple với chip A17 Pro và khung titanium.',
                'category_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Samsung Galaxy S24 Ultra',
                'description' => 'Siêu phẩm Galaxy S với màn hình Dynamic AMOLED 2X 120Hz.',
                'category_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Xiaomi 14 Ultra',
                'description' => 'Camera Leica đỉnh cao, sạc nhanh siêu tốc.',
                'category_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Samsung Galaxy A55',
                'description' => 'Điện thoại tầm trung mạnh mẽ với camera sắc nét.',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Xiaomi Redmi Note 13 Pro',
                'description' => 'Hiệu năng vượt trội trong phân khúc giá rẻ.',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Oppo Reno 11 F',
                'description' => 'Thiết kế mỏng nhẹ, chụp chân dung cực đỉnh.',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Vivo V30',
                'description' => 'Chụp ảnh cực đẹp với camera chân dung Aura Light.',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Google Pixel 8',
                'description' => 'Chụp ảnh AI cực xịn từ Google.',
                'category_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Realme 12+',
                'description' => 'Điện thoại hiệu năng tốt trong tầm giá.',
                'category_id' => 2,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
