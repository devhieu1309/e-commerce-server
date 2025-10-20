<?php

namespace Database\Seeders;

use App\Models\News_Blocks;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsBlocksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $newsBlocks = [
            [
                'title' => '1. iPhone 15 màu hồng có mấy phiên bản?',
                'content' => 'Apple ra mắt hai phiên bản màu hồng dành iPhone 15 series gồm dòng thường và dòng Plus. Sắc hồng nhạt quyến rũ, gam màu nhẹ nhàng, không quá nổi bật nhưng tạo nên cá tính riêng cho các phái nữ khi sử dụng. 

Cả hai phiên bản không chỉ giống nhau về màu sắc mà còn cả thiết kế, điểm khác biệt duy nhất là phiên bản Plus có kích thước lớn hơn, màn hình 6.7 inch. Ngoài ra, màu sắc trên chiếc iPhone 15 đồng bộ cả với logo với mặt lưng kính pha màu. ',
                'image' => 'news1.jpg',
                'position' => 1,
                'news_id' => 1,

            ],
            [
                'title' => '2. Những điểm độc đáo trên iPhone 15 hồng ',
                'content' => 'Sau 1 năm dày công nghiên cứu, Apple đã không làm người dùng thất vọng với phiên bản mới năm nay. Những thay đổi thực sự tạo nên cuộc cách mạng về diện mạo của iPhone 15 hồng',
                'image' => 'news2.jpg',
                'position' => 2,
                'news_id' => 1,

            ],
            [
                'title' => '2.1 Diện mạo mới lôi cuốn',
                'content' => 'Phiên bản mới sở hữu màn hình đục lỗ kết hợp tính năng Dynamic Island. Bộ đôi tạo nên cơn sốt năm ngoái khi chiếc iPhone 14 Pro Max được trình làng. Không chỉ vậy, viền màn hình được bo cong nhẹ tạo cảm giác cầm nắm thoải mái, chắc chắn. ',
                'image' => 'news3.jpg',
                'position' => 3,
                'news_id' => 1,

            ],
            [
                'title' => 'Tin tức công nghệ 4',
                'content' => 'Nội dung chi tiết của tin tức công nghệ số 4.',
                'image' => 'news4.jpg',
                'position' => 4,
                'news_id' => 2,

            ],
            [
                'title' => 'Tin tức công nghệ 5',
                'content' => 'Nội dung chi tiết của tin tức công nghệ số 5.',
                'image' => 'news5.jpg',
                'position' => 5,
                'news_id' => 2,

            ],
            [
                'title' => 'Tin tức công nghệ 6',
                'content' => 'Nội dung chi tiết của tin tức công nghệ số 6.',
                'image' => 'news6.jpg',
                'position' => 6,
                'news_id' => 3,

            ],
            [
                'title' => 'Tin tức công nghệ 7',
                'content' => 'Nội dung chi tiết của tin tức công nghệ số 7.',
                'image' => 'news7.jpg',
                'position' => 7,
                'news_id' => 3,

            ],
            [
                'title' => 'Tin tức công nghệ 8',
                'content' => 'Nội dung chi tiết của tin tức công nghệ số 8.',
                'image' => 'news8.jpg',
                'position' => 8,
                'news_id' => 3,

            ],
            [
                'title' => 'Tin tức công nghệ 9',
                'content' => 'Nội dung chi tiết của tin tức công nghệ số 9.',
                'image' => 'news9.jpg',
                'position' => 9,
                'news_id' => 4,

            ],
            [
                'title' => 'Tin tức công nghệ 10',
                'content' => 'Nội dung chi tiết của tin tức công nghệ số 10.',
                'image' => 'news10.jpg',
                'position' => 10,
                'news_id' => 4,

            ],
        ];

        foreach ($newsBlocks as $newsBlock) {
            News_Blocks::create([
                'title' => $newsBlock['title'],
                'content' => $newsBlock['content'],
                'image' => $newsBlock['image'],
                'position' => $newsBlock['position'],
                'news_id' => $newsBlock['news_id'],

            ]);
        }
    }
}
