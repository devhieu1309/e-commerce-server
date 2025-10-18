<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Điện thoại',
                'description' => 'Các sản phẩm điện thoại thông minh từ nhiều thương hiệu nổi tiếng như Apple, Samsung, Xiaomi...',
            ],
            [
                'name' => 'Ipad',
                'description' => 'Máy tính bảng Ipad với nhiều kích thước và cấu hình khác nhau, phù hợp cho học tập và công việc.',
            ],
            [
                'name' => 'Phụ kiện',
                'description' => 'Phụ kiện đi kèm như tai nghe, ốp lưng, sạc nhanh, cáp sạc và nhiều sản phẩm khác.',
            ],
            [
                'name' => 'Laptop',
                'description' => 'Laptop các dòng như MacBook, Asus, Dell, HP... phục vụ học tập, làm việc và giải trí.',
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'category_name' => $category['name'],
                'description' => $category['description'],
            ]);
        }
    }
}
