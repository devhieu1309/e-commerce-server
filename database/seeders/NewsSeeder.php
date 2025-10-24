<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $news = [
            [
                'title' => 'iPhone 15 hồng có mấy phiên bản? 5 Điểm độc đáo khiến nhiều chị em yêu thích',
                'cover_image' => 'news/iPhone-15-1.jpg',

            ],
            [
                'title' => 'iPhone 15 có mấy màu? Màu nào đẹp nhất',
                'cover_image' => 'news/tt9.png',

            ],
            [
                'title' => 'Chi phí sản xuất iPhone 15 Series',
                'cover_image' => 'news/tt8.webp',

            ],
            [
                'title' => 'Cổng sạc USB-C IPhone 15 và công dụng',
                'cover_image' => 'news/tt7.webp',

            ],
            // [
            //     'title' => 'Flash Sale Cuối Tuần',
            //     'cover_image' => 'news/tt7.webp',

            // ],
            [
                'title' => '14 cập nhật tính năng trên iOS 17.1',
                'cover_image' => 'news/tt6.webp',

            ],
            [
                'title' => 'Nên lựa chọn mẫu Apple Pencil nào trong 3 phiên bản',
                'cover_image' => 'news/tt5.webp',

            ],
            [
                'title' => 'Tổng hợp sự kiện Apple Scary Fast: 3 bộ vi xử lý Apple M3, MacBook Pro 14 & 16 inch và iMac M3',
                'cover_image' => 'news/tt4.webp',

            ],
            [
                'title' => 'iMac M1 và iMac M3: Nên chọn mua mẫu nào?',
                'cover_image' => 'news/tt3.webp',

            ],
            [
                'title' => '7 Cập nhật tính năng trên iOS 17.2 beta 2',
                'cover_image' => 'news/tt2.webp',

            ],
            [
                'title' => 'Apple đang phát triển công nghệ pin mới: Sạc nhanh và tuổi thọ pin cao hơn',
                'cover_image' => 'news/tt1.webp',

            ],
        ];
        foreach ($news as $new) {
            News::create([
                'title' => $new['title'],
                'cover_image' => $new['cover_image']

            ]);
        }
    }
}
