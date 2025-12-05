<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ShoppingOrder;
use App\Models\ProductItem;
use App\Models\OrderLine;
class ShoppingOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productItems = ProductItem::all();

        ShoppingOrder::factory()->count(20)->create()->each(function ($order) use ($productItems) {
            $itemsCount = rand(1, 3);
            $randomItems = $productItems->random($itemsCount);

            foreach ($randomItems as $item) {
                OrderLine::create([
                    'shop_order_id' => $order->shop_order_id,
                    'product_item_id' => $item->product_item_id,
                    'quantity' => fake()->numberBetween(1, 3),
                    'price' => $item->price,
                ]);
            }
        });
    }
}
