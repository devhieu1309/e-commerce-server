<?php

namespace Database\Seeders;

use App\Models\News_Blocks;
use App\Models\Product;
use App\Models\ProductItem;

use App\Models\User;
use App\Models\VariationOption;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin123@gmail.com',
            'password' => Hash::make('Admin@123'),
            'role' => 'admin', 
        ]);

        $this->call(CategorySeeder::class);
        $this->call(ShippingMethodSeeder::class);
        $this->call(OrderStatusSeeder::class);
        $this->call(PaymentTypeSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(BannerSeeder::class);
        // $this->call(OrderStatusSeeder::class);
        $this->call(NewsBlocksSeeder::class);
        $this->call(VariationSeeder::class);
        $this->call(VariationOptionSeeder::class);
        $this->call(ProductSeeder::class);  // 1
        $this->call(ProductItemSeeder::class);
        $this->call(ProductConfigurationSeeder::class);
         $this->call(ProductConfigurationSeeder::class);
        $this->call(VideoReviewSeeder::class);

        $this->call(PromotionSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(WardSeeder::class);
        $this->call(AddressSeeder::class);
        $this->call(StoreBranchSeeder::class);

        $this->call(WarrantySeeder::class);

        $this->call(ShoppingCartSeeder::class);
        $this->call(CommentsSeeder::class);

        $this->call(ShoppingOrderSeeder::class);
        $this->call(OrderLineSeeder::class);
    }
}

