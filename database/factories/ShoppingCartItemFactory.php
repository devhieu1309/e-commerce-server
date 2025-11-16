<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ShoppingCart;
use App\Models\ProductItem;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShoppingCartItem>
 */
class ShoppingCartItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $cartIds = null;

        // Lấy toàn bộ id giỏ hàng 1 lần duy nhất
        if ($cartIds === null) {
            $cartIds = ShoppingCart::pluck('shopping_cart_id')->toArray();
        }

        // Nếu không có giỏ hàng thì tạo 1 giỏ hàng mặc định
        if (empty($cartIds)) {
            $cart = ShoppingCart::factory()->create();
            $cartIds = [$cart->id];
        }

        return [
            'shopping_cart_id' => $this->faker->randomElement($cartIds),
            'product_item_id' => ProductItem::inRandomOrder()->value('product_item_id') ?? 1,
            'quantity' => $this->faker->numberBetween(1, 5),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
