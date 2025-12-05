<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderLine;
use App\Models\ShoppingOrder;
use App\Models\ProductItem;

class OrderLineSeeder extends Seeder
{
    public function run(): void
    {
        // $orders = ShoppingOrder::all();
        // $productItems = ProductItem::all();

        // foreach (range(1, 20) as $i) {
        //     $order = $orders->random();
        //     $item = $productItems->random();

        //     OrderLine::create([
        //         'shop_order_id' => $order->shop_order_id,
        //         'product_item_id' => $item->product_item_id,
        //         'quantity' => fake()->numberBetween(1, 3),
        //         'price' => $item->price,
        //     ]);
        // }
    }
}
