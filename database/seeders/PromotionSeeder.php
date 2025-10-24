<?php

namespace Database\Seeders;

use App\Models\Promotion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $promotions = [
            [
                'name' => 'Flash Sale 1 Giờ – Siêu Hot',
                'description' => 'Giảm mạnh giá điện thoại trong khung giờ vàng từ 12h–13h mỗi ngày. Số lượng có hạn.',
                'discount_rate' => 25,
                'start_date' => '2025-09-01 12:00:00',
                'end_date' => '2025-09-10 08:00:00',
            ],
            [
                'name' => 'Ưu Đãi Mua Online – Giảm 15%',
                'description' => 'Giảm 15% cho khách hàng đặt mua điện thoại trực tuyến và thanh toán online.',
                'discount_rate' => 15,
                'start_date' => '2025-09-05 00:00:00',
                'end_date' => '2025-09-20 23:59:59',
            ],
            [
                'name' => 'Giảm Giá Hàng Cao Cấp 10%',
                'description' => 'Ưu đãi cho các dòng điện thoại cao cấp như iPhone, Samsung Galaxy, Xiaomi Ultra.',
                'discount_rate' => 10,
                'start_date' => '2025-09-10 09:00:00',
                'end_date' => '2025-09-30 23:59:59',
            ],
            [
                'name' => 'Mua 2 Giảm Thêm 5%',
                'description' => 'Khi mua 2 điện thoại bất kỳ, bạn sẽ được giảm thêm 5% trên tổng giá trị đơn hàng.',
                'discount_rate' => 5,
                'start_date' => '2025-09-12 00:00:00',
                'end_date' => '2025-09-22 23:59:59',
            ],
            [
                'name' => 'Ngày Khách Hàng – Giảm 20%',
                'description' => 'Tri ân khách hàng thân thiết, giảm 20% toàn bộ sản phẩm trong ngày 15/09.',
                'discount_rate' => 20,
                'start_date' => '2025-09-15 00:00:00',
                'end_date' => '2025-09-15 23:59:59',
            ],
            [
                'name' => 'Black Friday – Giảm Sốc 30%',
                'description' => 'Đại tiệc mua sắm lớn nhất năm với mức giảm đến 30% cho toàn bộ điện thoại.',
                'discount_rate' => 30,
                'start_date' => '2025-11-25 00:00:00',
                'end_date' => '2025-11-30 23:59:59',
            ],
            [
                'name' => 'Chào Năm Mới – Giảm 25%',
                'description' => 'Đón năm mới cùng ưu đãi giảm 25% cho các dòng điện thoại chính hãng.',
                'discount_rate' => 25,
                'start_date' => '2025-12-30 00:00:00',
                'end_date' => '2026-01-05 23:59:59',
            ],
            [
                'name' => 'Khuyến Mãi Đêm: Giảm 12%',
                'description' => 'Giảm ngay 12% khi đặt mua điện thoại từ 20h – 23h hằng ngày.',
                'discount_rate' => 12,
                'start_date' => '2025-09-01 20:00:00',
                'end_date' => '2025-09-30 23:00:00',
            ],
            [
                'name' => 'Sale Tận Nhà – Giảm 18%',
                'description' => 'Giảm 18% cho khách hàng đặt hàng giao tận nơi qua website chính thức.',
                'discount_rate' => 18,
                'start_date' => '2025-09-05 00:00:00',
                'end_date' => '2025-09-25 23:59:59',
            ],
            [
                'name' => 'Ưu Đãi Trả Góp 0%',
                'description' => 'Hỗ trợ trả góp 0% lãi suất cho các đơn hàng từ 5 triệu đồng trở lên.',
                'discount_rate' => 0,
                'start_date' => '2025-09-01 00:00:00',
                'end_date' => '2025-12-31 23:59:59',
            ],
            [
                'name' => 'Combo Phụ Kiện – Giảm 15%',
                'description' => 'Khi mua điện thoại, khách hàng sẽ được giảm 15% cho combo phụ kiện đi kèm.',
                'discount_rate' => 15,
                'start_date' => '2025-09-01 00:00:00',
                'end_date' => '2025-09-30 23:59:59',
            ],
            [
                'name' => 'Sinh Nhật Dola Phone – Giảm 25% Toàn Bộ',
                'description' => 'Mừng sinh nhật Dola Phone, giảm ngay 25% tất cả sản phẩm trong 3 ngày.',
                'discount_rate' => 25,
                'start_date' => '2025-10-01 00:00:00',
                'end_date' => '2025-10-03 23:59:59',
            ],
            [
                'name' => 'Giảm 10% Cho Khách Hàng Mới',
                'description' => 'Khách hàng lần đầu mua sắm tại website sẽ được giảm ngay 10%.',
                'discount_rate' => 10,
                'start_date' => '2025-09-01 00:00:00',
                'end_date' => '2025-12-31 23:59:59',
            ],
            [
                'name' => 'Miễn Phí Vận Chuyển Toàn Quốc',
                'description' => 'Áp dụng miễn phí vận chuyển cho mọi đơn hàng trên 2 triệu đồng.',
                'discount_rate' => 0,
                'start_date' => '2025-09-01 00:00:00',
                'end_date' => '2025-12-31 23:59:59',
            ],
            [
                'name' => 'Giờ Vàng Deal Sốc – Giảm 40%',
                'description' => 'Giảm cực sâu 40% trong khung giờ 19h–21h mỗi tối, áp dụng cho sản phẩm chọn lọc.',
                'discount_rate' => 40,
                'start_date' => '2025-09-10 19:00:00',
                'end_date' => '2025-09-20 21:00:00',
            ],
        ];

        foreach ($promotions as $promotion) {
            Promotion::create([
                'promotion_name' => $promotion['name'],
                'description' => $promotion['description'],
                'discount_rate' => $promotion['discount_rate'],
                'start_date' => $promotion['start_date'],
                'end_date' => $promotion['end_date'],
            ]);
        }
    }
}
