<?php

namespace Database\Seeders;

use App\Models\News_Blocks;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // CategorySeeder::class,
            // ProductSeeder::class,
            // VideoReviewSeeder::class,
            // NewsSeeder::class
        ]);

        $this->call(CategorySeeder::class);
        $this->call(ShippingMethodSeeder::class);
        $this->call(OrderStatusSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(BannerSeeder::class);
        $this->call(OrderStatusSeeder::class);
        $this->call(NewsBlocksSeeder::class);
        $this->call(VariationSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(VideoReviewSeeder::class);

        $this->call(PromotionSeeder::class);
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

    }
}
