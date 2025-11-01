<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('comments')->insert([
            [
                'fullname' => 'Nguyễn Minh Hiếu',
                'email' => 'minhhieu@example.com',
                'content' => 'Bài viết rất hay và hữu ích, cảm ơn tác giả đã chia sẻ!',
                'news_id' => 1,
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now()

            ],
            [
                'fullname' => 'Trần Thị Thu Trang',
                'email' => 'thutrang@example.com',
                'content' => 'Mình thấy nội dung này rất chi tiết, mong tác giả viết thêm phần 2.',
                'news_id' => 1,
                'user_id' => null,
                'created_at' => now(),
                'updated_at' => now()


            ],
            [
                'fullname' => 'Phạm Anh Tuấn',
                'email' => 'anhtuan@example.com',
                'content' => 'Cảm ơn bài viết, mình đã hiểu rõ hơn về chủ đề này.',
                'news_id' => 2,
                'user_id' => 3,
                'created_at' => now(),
                'updated_at' => now()


            ],
            [
                'fullname' => 'Lê Hồng Phúc',
                'email' => 'hongphuc@example.com',
                'content' => 'Bài này viết tốt, nhưng phần ví dụ hơi ít, bạn có thể bổ sung thêm không?',
                'news_id' => 2,
                'user_id' => null,
                'created_at' => now(),
                'updated_at' => now()


            ],
            [
                'fullname' => 'Đặng Bảo Ngọc',
                'email' => 'baongoc@example.com',
                'content' => 'Mình đã chia sẻ bài này cho bạn bè, cảm ơn admin!',
                'news_id' => 3,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now()


            ],
            [
                'fullname' => 'Hoàng Gia Bảo',
                'email' => 'giabao@example.com',
                'content' => 'Phần trình bày dễ hiểu, nhưng có vài lỗi chính tả nhỏ.',
                'news_id' => 3,
                'user_id' => null,
                'created_at' => now(),
                'updated_at' => now()


            ],
            [
                'fullname' => 'Ngô Thanh Tùng',
                'email' => 'thanhtung@example.com',
                'content' => 'Thực sự rất hữu ích, mình đã áp dụng thành công sau khi đọc.',
                'news_id' => 4,
                'user_id' => 2,
                'created_at' => now(),
                'updated_at' => now()


            ],
            [
                'fullname' => 'Vũ Hồng Nhung',
                'email' => 'hongnhung@example.com',
                'content' => 'Bài viết này giúp mình hiểu thêm nhiều kiến thức mới.',
                'news_id' => 4,
                'user_id' => null,
                'created_at' => now(),
                'updated_at' => now()


            ],
        ]);
    }
}
