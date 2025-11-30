<?php

namespace Database\Seeders;

use App\Models\CompareProducts;
use App\Models\Product;
use App\Models\ProductItem;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompareProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = User::all();
        $productItem = ProductItem::all();

        foreach (range(1, 3) as $i) {
            CompareProducts::create([
                'user_id' => $users->random()->user_id,
                'product_item_id' => $productItem->random()->product_item_id,
            ]);
        }
    }
}
