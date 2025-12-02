<?php

namespace Database\Factories;

use App\Models\CompareProducts;
use App\Models\ProductItem;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CompareProductFactory extends Factory
{
    protected $model = CompareProducts::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'product_item_id' => ProductItem::factory(),
            'user_id' => User::factory(),
        ];
    }
}
