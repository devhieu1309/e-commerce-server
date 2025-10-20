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
                'title' => 'Khuyến mãi mùa hè',
                'cover_image' => 'summer_sale.jpg',

            ],
            [
                'title' => 'Giảm giá mùa đông',
                'cover_image' => 'winter_sale.jpg',

            ],
            [
                'title' => 'Sản phẩm mới 2025',
                'cover_image' => 'new_product_2025.jpg',

            ],
            [
                'title' => 'Ưu đãi khách hàng VIP',
                'cover_image' => 'vip_offer.jpg',

            ],
            [
                'title' => 'Flash Sale Cuối Tuần',
                'cover_image' => 'flash_sale.jpg',

            ],
            [
                'title' => 'Giảm giá điện thoại',
                'cover_image' => 'phone_discount.jpg',

            ],
            [
                'title' => 'Khuyến mãi Laptop',
                'cover_image' => 'laptop_promo.jpg',

            ],
            [
                'title' => 'Phụ kiện công nghệ HOT',
                'cover_image' => 'accessories_hot.jpg',

            ],
            [
                'title' => 'Thời trang Xuân Hè',
                'cover_image' => 'fashion_spring.jpg',

            ],
            [
                'title' => 'Sự kiện ra mắt sản phẩm mới',
                'cover_image' => 'new_event.jpg',

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
