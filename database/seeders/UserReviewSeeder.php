<?php

namespace Database\Seeders;

use App\Models\ShoppingOrder;
use App\Models\User;
use App\Models\UserReview;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = User::all();
        $shopOrder = ShoppingOrder::all();

        foreach (range(1, 5)  as $i) {
            UserReview::create([
                'rating' => rand(1, 5),
                'comment' => 'This is a sample review comment ' . $i,
                'user_id' => $users->random()->user_id,
                'shop_order_id' => $shopOrder->random()->shop_order_id,
            ]);
        }
    }
}
