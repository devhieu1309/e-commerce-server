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

        // DB::table('products')->insert([
        //     [
        //         'product_name' => 'iPhone 15 Pro Max',
        //         'description' => 'Flagship mới nhất của Apple với chip A17 Pro và khung titanium.',
        //         'category_id' => 1,
        //         'created_at' => '2024-11-01 10:00:00',
        //         'updated_at' => $now,
        //     ],
        //     [
        //         'product_name' => 'Samsung Galaxy S24 Ultra',
        //         'description' => 'Siêu phẩm Galaxy S với màn hình Dynamic AMOLED 2X 120Hz.',
        //         'category_id' => 1,
        //         'created_at' => '2024-11-01 10:00:00',
        //         'updated_at' => $now,
        //     ],
        //     [
        //         'product_name' => 'Xiaomi 14 Ultra',
        //         'description' => 'Camera Leica đỉnh cao, sạc nhanh siêu tốc.',
        //         'category_id' => 1,
        //         'created_at' => '2024-11-01 10:00:00',
        //         'updated_at' => $now,
        //     ],
        //     [
        //         'product_name' => 'Samsung Galaxy A55',
        //         'description' => 'Điện thoại tầm trung mạnh mẽ với camera sắc nét.',
        //         'category_id' => 2,
        //         'created_at' => '2024-11-01 10:00:00',
        //         'updated_at' => $now,
        //     ],
        //     [
        //         'product_name' => 'Xiaomi Redmi Note 13 Pro',
        //         'description' => 'Hiệu năng vượt trội trong phân khúc giá rẻ.',
        //         'category_id' => 2,
        //         'created_at' => '2024-11-01 10:00:00',
        //         'updated_at' => $now,
        //     ],
        //     [
        //         'product_name' => 'Oppo Reno 11 F',
        //         'description' => 'Thiết kế mỏng nhẹ, chụp chân dung cực đỉnh.',
        //         'category_id' => 2,
        //         'created_at' => '2024-11-01 10:00:00',
        //         'updated_at' => $now,
        //     ],
        //     [
        //         'product_name' => 'Vivo V30',
        //         'description' => 'Chụp ảnh cực đẹp với camera chân dung Aura Light.',
        //         'category_id' => 2,
        //         'created_at' => '2024-11-01 10:00:00',
        //         'updated_at' => $now,
        //     ],
        //     [
        //         'product_name' => 'Google Pixel 8',
        //         'description' => 'Chụp ảnh AI cực xịn từ Google.',
        //         'category_id' => 1,
        //         'created_at' => '2024-11-01 10:00:00',
        //         'updated_at' => $now,
        //     ],
        //     [
        //         'product_name' => 'Realme 12+',
        //         'description' => 'Điện thoại hiệu năng tốt trong tầm giá.',
        //         'category_id' => 2,
        //         'created_at' => '2024-11-01 10:00:00',
        //         'updated_at' => $now,
        //     ],
        // ]);
        DB::table('products')->insert([
            [
                'product_name' => 'iPhone 15',
                'description' => 'Flagship mới nhất của Apple với chip A17 Pro và khung titanium.',
                'category_id' => 1,
                'created_at' => '2024-11-08 10:00:00',
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Samsung Galaxy S24 Ultra 2',
                'description' => 'Siêu phẩm Galaxy S với màn hình Dynamic AMOLED 2X 120Hz.',
                'category_id' => 1,
                'created_at' => '2024-11-07 10:00:00',
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Xiaomi 14 Ultra 3',
                'description' => 'Camera Leica đỉnh cao, sạc nhanh siêu tốc.',
                'category_id' => 1,
                'created_at' => '2024-11-06 10:00:00',
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Samsung Galaxy A55 4',
                'description' => 'Điện thoại tầm trung mạnh mẽ với camera sắc nét.',
                'category_id' => 2,
                'created_at' => '2024-11-07 10:00:00',
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Xiaomi Redmi Note 13 Pro 5',
                'description' => 'Hiệu năng vượt trội trong phân khúc giá rẻ.',
                'category_id' => 2,
                'created_at' => '2024-11-05 10:00:00',
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Oppo Reno 11 F 4',
                'description' => 'Thiết kế mỏng nhẹ, chụp chân dung cực đỉnh.',
                'category_id' => 2,
                'created_at' => '2024-11-01 10:00:00',
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Vivo V30 7',
                'description' => 'Chụp ảnh cực đẹp với camera chân dung Aura Light.',
                'category_id' => 2,
                'created_at' => '2024-11-08 10:00:00',
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Google Pixel 8 8',
                'description' => 'Chụp ảnh AI cực xịn từ Google.',
                'category_id' => 1,
                'created_at' => '2024-11-07 10:00:00',
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Realme 12+ 9',
                'description' => 'Điện thoại hiệu năng tốt trong tầm giá.',
                'category_id' => 2,
                'created_at' => '2024-11-06 10:00:00',
                'updated_at' => $now,
            ],
            [
                'product_name' => 'iPhone 14 Pro 10',
                'description' => 'Màn hình Dynamic Island, hiệu năng ổn định với chip A16 Bionic.',
                'category_id' => 1,
                'created_at' => '2024-11-07 10:00:00',
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Samsung Galaxy Z Fold5',
                'description' => 'Điện thoại gập cao cấp với khả năng đa nhiệm vượt trội.',
                'category_id' => 1,
                'created_at' => '2024-11-01 10:00:00',
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Xiaomi 13T Pro',
                'description' => 'Máy ảnh Leica, hiệu năng mạnh với Dimensity 9200+.',
                'category_id' => 1,
                'created_at' => '2024-11-01 10:00:00',
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Oppo Find N3 Flip',
                'description' => 'Điện thoại gập nhỏ gọn, camera chất lượng cao.',
                'category_id' => 2,
                'created_at' => '2024-11-01 10:00:00',
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Vivo Y100',
                'description' => 'Mẫu điện thoại trẻ trung, pin bền, sạc nhanh 44W.',
                'category_id' => 2,
                'created_at' => '2024-11-01 10:00:00',
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Realme GT Neo 5',
                'description' => 'Sạc nhanh 240W, hiệu năng đỉnh cao trong tầm giá.',
                'category_id' => 2,
                'created_at' => '2024-11-01 10:00:00',
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Asus ROG Phone 8',
                'description' => 'Điện thoại gaming mạnh mẽ với chip Snapdragon 8 Gen 3.',
                'category_id' => 3,
                'created_at' => '2024-11-01 10:00:00',
                'updated_at' => $now,
            ],
            [
                'product_name' => 'OnePlus 12',
                'description' => 'Màn hình 2K, hiệu năng mạnh, sạc nhanh 100W.',
                'category_id' => 1,
                'created_at' => '2024-11-01 10:00:00',
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Honor Magic6 Pro',
                'description' => 'Camera zoom xa ấn tượng, thiết kế cao cấp.',
                'category_id' => 1,
                'created_at' => '2024-11-01 10:00:00',
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Tecno Camon 30 Pro',
                'description' => 'Giá rẻ, camera ổn, pin trâu cho học sinh sinh viên.',
                'category_id' => 2,
                'created_at' => '2024-11-01 10:00:00',
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Infinix Zero 30',
                'description' => 'Hiệu năng tốt, màn hình AMOLED 120Hz.',
                'category_id' => 2,
                'created_at' => '2024-11-01 10:00:00',
                'updated_at' => $now,
            ],
            [
                'product_name' => 'iPhone 13',
                'description' => 'Mẫu iPhone ổn định, camera kép chất lượng, giá hợp lý.',
                'category_id' => 1,
                'created_at' => '2024-11-01 10:00:00',
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Samsung Galaxy M14',
                'description' => 'Dung lượng pin khủng 6000mAh, hiệu năng ổn định.',
                'category_id' => 2,
                'created_at' => '2024-11-01 10:00:00',
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Xiaomi Poco F5 Pro',
                'description' => 'Chip Snapdragon 8+ Gen 1, màn hình AMOLED 120Hz.',
                'category_id' => 2,
                'created_at' => '2024-11-01 10:00:00',
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Oppo A79 5G',
                'description' => 'Thiết kế thanh lịch, hiệu năng ổn định với Dimensity 6020.',
                'category_id' => 2,
                'created_at' => '2024-11-01 10:00:00',
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Vivo Y36',
                'description' => 'Pin lớn 5000mAh, sạc nhanh 44W, thiết kế trẻ trung.',
                'category_id' => 2,
                'created_at' => '2024-11-01 10:00:00',
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Realme C67',
                'description' => 'Giá rẻ, pin trâu, phù hợp cho người dùng phổ thông.',
                'category_id' => 2,
                'created_at' => '2024-11-01 10:00:00',
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Asus Zenfone 10',
                'description' => 'Kích thước nhỏ gọn, hiệu năng mạnh, camera chống rung Gimbal.',
                'category_id' => 3,
                'created_at' => '2024-11-01 10:00:00',
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Nothing Phone (2)',
                'description' => 'Thiết kế trong suốt độc đáo, trải nghiệm Android gốc.',
                'category_id' => 1,
                'created_at' => '2024-11-01 10:00:00',
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Huawei P60 Pro',
                'description' => 'Camera siêu zoom, thiết kế sang trọng, hiệu năng mạnh mẽ.',
                'category_id' => 1,
                'created_at' => '2024-11-01 10:00:00',
                'updated_at' => $now,
            ],
            [
                'product_name' => 'Motorola Edge 40',
                'description' => 'Thiết kế cong đẹp mắt, sạc nhanh 68W.',
                'category_id' => 1,
                'created_at' => '2024-11-01 10:00:00',
                'updated_at' => $now,
            ],
        ]);
    }
}
