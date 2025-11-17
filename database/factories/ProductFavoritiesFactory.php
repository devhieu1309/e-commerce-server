<?php

namespace Database\Factories;

use App\Models\ProductFavorites;
use App\Models\ProductItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductFavoritiesFactory extends Factory
{
    protected $model = ProductFavorites::class;

    public function definition(): array
    {
        return [
            //
            'user_id' => User::factory(),
            'product_item_id' => ProductItem::factory()
        ];
    }
}
