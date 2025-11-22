<?php

namespace Database\Seeders;

use App\Models\ProductFavorites;
use App\Models\ProductItem;
use App\Models\User;
use Illuminate\Database\Seeder;


class ProductFavoritiesSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $productItems = ProductItem::all();

        // Thêm 5 bản ghi ngẫu nhiên
        foreach (range(1, 5) as $i) {
            ProductFavorites::create([
                'user_id' => $users->random()->user_id,
                'product_item_id' => $productItems->random()->product_item_id,
            ]);
        }
    }
}
