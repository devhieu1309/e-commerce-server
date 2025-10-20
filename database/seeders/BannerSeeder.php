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
                'image' => 'banner/ytiMyKIio1oy7ohqJ0olsfgC6gGqaZdh.png',
                'link_url' => 'https://example.com/summer-sale',
                'position' => 'home',
                'is_active' => 1,
            ],
            [
                'title' => 'Giảm giá mùa đông',
                'image' => 'banner/ytiMyKIio1oy7ohqJ0olsfgC6gGqaZdh.png',
                'link_url' => 'https://example.com/winter-sale',
                'position' => 'home',
                'is_active' => 1,
            ],
            [
                'title' => 'Sản phẩm mới 2025',
                'image' => 'banner/ytiMyKIio1oy7ohqJ0olsfgC6gGqaZdh.png',
                'link_url' => 'https://example.com/new-2025',
                'position' => 'product',
                'is_active' => 1,
            ],
            [
                'title' => 'Ưu đãi khách hàng VIP',
                'image' => 'banner/ytiMyKIio1oy7ohqJ0olsfgC6gGqaZdh.png',
                'link_url' => 'https://example.com/vip',
                'position' => 'home',
                'is_active' => 1,
            ],
            [
                'title' => 'Flash Sale Cuối Tuần',
                'image' => 'banner/ytiMyKIio1oy7ohqJ0olsfgC6gGqaZdh.png',
                'link_url' => 'https://example.com/flash-sale',
                'position' => 'product',
                'is_active' => 1,
            ],
            [
                'title' => 'Giảm giá điện thoại',
                'image' => 'banner/ytiMyKIio1oy7ohqJ0olsfgC6gGqaZdh.png',
                'link_url' => 'https://example.com/phones',
                'position' => 'product',
                'is_active' => 1,
            ],
            [
                'title' => 'Khuyến mãi Laptop',
                'image' => 'banner/ytiMyKIio1oy7ohqJ0olsfgC6gGqaZdh.png',
                'link_url' => 'https://example.com/phones',
                'link_url' => 'https://example.com/laptops',
                'position' => 'product',
                'is_active' => 1,
            ],
            [
                'title' => 'Phụ kiện công nghệ HOT',
                'image' => 'banner/ytiMyKIio1oy7ohqJ0olsfgC6gGqaZdh.png',
                'link_url' => 'https://example.com/phones',
                'link_url' => 'https://example.com/accessories',
                'position' => 'product',
                'is_active' => 1,
            ],
            [
                'title' => 'Thời trang Xuân Hè',
                'image' => 'banner/ytiMyKIio1oy7ohqJ0olsfgC6gGqaZdh.png',
                'link_url' => 'https://example.com/phones',
                'link_url' => 'https://example.com/fashion',
                'position' => 'home',
                'is_active' => 1,
            ],
            [
                'title' => 'Sự kiện ra mắt sản phẩm mới',
                'image' => 'banner/ytiMyKIio1oy7ohqJ0olsfgC6gGqaZdh.png',
                'link_url' => 'https://example.com/phones',
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
