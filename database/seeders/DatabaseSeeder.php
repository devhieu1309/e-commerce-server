<?php

namespace Database\Seeders;

use App\Models\News_Blocks;
use App\Models\Product;
use App\Models\ProductItem;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\VariationOption;

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
        $this->call(VariationOptionSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ProductItemSeeder::class);
        $this->call(ProductConfigurationSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(WardSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(StoreBranchSeeder::class);

        $this->call(WarrantySeeder::class);

        $this->call(ShoppingCartSeeder::class);
        
    }
}
