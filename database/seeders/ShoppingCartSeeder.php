<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ShoppingCart;
use App\Models\ShoppingCartItem;
use App\Models\User;

class ShoppingCartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo 20 user trước, sau đó tạo 1 giỏ hàng cho mỗi user.
        $users = User::factory(20)->create();

        foreach ($users as $user) {
            ShoppingCart::factory()->create(['user_id' => $user->user_id]);
        }

        // Tạo 20 sản phẩm trong giỏ hàng (factory của item nên chọn shopping_cart_id sẵn có)
        ShoppingCartItem::factory(20)->create();
    }
}
