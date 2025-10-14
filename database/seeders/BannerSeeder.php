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
                'title' => 'Banner 1',
                'image' => 'banner1.jpg',
                'link_url' => 'https://example.com/banner1',
                'position' => 'home',
                'is_active' => 1
            ],
            [
                'title' => 'Banner 2',
                'image' => 'banner2.jpg',
                'link_url' => 'https://example.com/banner2',
                'position' => 'product  ',
                'is_active' => 1
            ],
            [
                'title' => 'Banner 3',
                'image' => 'banner3.jpg',
                'link_url' => 'https://example.com/banner3',
                'position' => 'product',
                'is_active' => 0
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
