<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $banners = [
            [
                'title' => 'Khuyến mãi mùa hè',
                'image' => 'summer_sale.jpg',
                'link_url' => 'https://example.com/summer-sale',
                'position' => 'home',
                'is_active' => 1,
            ],
            [
                'title' => 'Giảm giá mùa đông',
                'image' => 'winter_sale.jpg',
                'link_url' => 'https://example.com/winter-sale',
                'position' => 'home',
                'is_active' => 1,
            ],
            [
                'title' => 'Sản phẩm mới 2025',
                'image' => 'new_product_2025.jpg',
                'link_url' => 'https://example.com/new-2025',
                'position' => 'product',
                'is_active' => 1,
            ],
            [
                'title' => 'Ưu đãi khách hàng VIP',
                'image' => 'vip_offer.jpg',
                'link_url' => 'https://example.com/vip',
                'position' => 'home',
                'is_active' => 1,
            ],
            [
                'title' => 'Flash Sale Cuối Tuần',
                'image' => 'flash_sale.jpg',
                'link_url' => 'https://example.com/flash-sale',
                'position' => 'product',
                'is_active' => 1,
            ],
            [
                'title' => 'Giảm giá điện thoại',
                'image' => 'phone_discount.jpg',
                'link_url' => 'https://example.com/phones',
                'position' => 'product',
                'is_active' => 1,
            ],
            [
                'title' => 'Khuyến mãi Laptop',
                'image' => 'laptop_promo.jpg',
                'link_url' => 'https://example.com/laptops',
                'position' => 'product',
                'is_active' => 1,
            ],
            [
                'title' => 'Phụ kiện công nghệ HOT',
                'image' => 'accessories_hot.jpg',
                'link_url' => 'https://example.com/accessories',
                'position' => 'product',
                'is_active' => 1,
            ],
            [
                'title' => 'Thời trang Xuân Hè',
                'image' => 'fashion_spring.jpg',
                'link_url' => 'https://example.com/fashion',
                'position' => 'home',
                'is_active' => 1,
            ],
            [
                'title' => 'Sự kiện ra mắt sản phẩm mới',
                'image' => 'new_event.jpg',
                'link_url' => 'https://example.com/event',
                'position' => 'home',
                'is_active' => 0,
            ],
        ];
        foreach ($banners as $banner) {
            Banner::create([
                'title' => $banner['title'],
                'image' => $banner['image'],
                'link_url' => $banner['link_url'],
                'position' => $banner['position'],
                'is_active' => $banner['is_active']
            ]);
        }
    }
}
