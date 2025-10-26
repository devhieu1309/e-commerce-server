<?php

namespace Database\Seeders;

use App\Models\NewsBlocks;
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
                'image' => 'newsBlocks/iPhone-15-1 (1).jpg',
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
                'image' => 'newsBlocks/iPhone-15-2.jpg',
                'position' => 3,
                'news_id' => 1,

            ],
            [
                'title' => '2.2 Hiển thị rõ nét',
                'content' => 'iPhone 15 hồng có độ phân giải 2556 x 1179p, Super Retina XDR tái tạo màu sắc tuyệt vời mang đến khung hình chân thực. Độ sáng màn hình 2000nits, người dùng có thể dễ dàng quan sát mọi nội dung hiển thị với điều kiện ánh sáng mạnh. Lớp kính Ceramic Shield chống bụi bẩn và va đập trong quá trình sử dụng. ',
                'image' => 'newsBlocks/iPhone-15-3.jpg',
                'position' => 4,
                'news_id' => 1,

            ],
            [
                'title' => '2.3 Bộ vi xử lý A16 Bionic',
                'content' => 'Apple A16 Bionic gồm 6 nhân CPU và 5 nhân GPU. Theo Antutu 9, điểm hiệu năng tổng thể đạt 1447183. Bộ vi xử lý đáp ứng mọi nhu cầu người dùng từ việc học tập, giải trí đến làm việc đa nhiệm. ',
                'image' => '',
                'position' => 5,
                'news_id' => 1,

            ],
            [
                'title' => '2.4 Camera ',
                'content' => 'iPhone 15 màu hồng được trang bị hệ thống camera ấn tượng hơn rất nhiều so với những năm trước đó. Camera chính 50MP mang đến bức hình chụp sắc nét, màu sắc chân thực so với 12MP phiên bản iPhone 14. Khả năng zoom quang học 2x giúp nắm bắt, chụp hình nhiều góc độ khác nhau. Không chỉ vậy, hãng trang bị cảm biến mới giúp việc thu sáng tốt hơn đem đến những bức hình chụp đêm xuất sắc. ',
                'image' => 'newsBlocks/iPhone-15-4.jpg',
                'position' => 6,
                'news_id' => 1,

            ],
            [
                'title' => '2.5 Màu hồng quyến rũ lôi cuốn ',
                'content' => 'Sau nhiều năm sử dụng gam màu đậm, iPhone 15 lựa chọn màu nhạt hơn. Tuy nhiên đánh giá nhiều người dùng, màu sắc mới hài hòa, ít nổi bật và nịnh mắt hơn hẳn. Đặc biệt, gam màu hồng nhạt tạo nên nét đẹp tinh tế, quyến rũ giúp tôn dáng người sở hữu. ',
                'image' => 'newsBlock/iPhone-15-5.jpg',
                'position' => 7,
                'news_id' => 1,

            ],
            [
                'title' => '3. Giá bán iPhone 15 hồng ',
                'content' => 'Những chiếc iPhone 15 và 15 Plus màu hồng được bán với mức giá khởi điểm là 799 và 899$. Còn tại thị trường Việt Nam, giá bán hai phiên bản lần lượt là 20.790.000 và 24.790.000đ ( cập nhật ngày 13/10/2023). ',
                'image' => 'newsBlocks/iPhone-15-6.jpg',
                'position' => 8,
                'news_id' => 1,

            ],
            [
                'title' => 'Tin tức công nghệ 9',
                'content' => 'Nội dung chi tiết của tin tức công nghệ số 9.',
                'image' => 'news',
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
            NewsBlocks::create([
                'title' => $newsBlock['title'],
                'content' => $newsBlock['content'],
                'image' => $newsBlock['image'],
                'position' => $newsBlock['position'],
                'news_id' => $newsBlock['news_id'],

            ]);
        }
    }
}
