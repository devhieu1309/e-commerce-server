<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\ShoppingCart;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShoppingCart>
 */
class ShoppingCartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $usedUserIds = ShoppingCart::query()->pluck('user_id')->all();

        $user = User::whereNotIn('user_id', $usedUserIds)->inRandomOrder()->first();

        if (! $user) {
            $user = User::factory()->create();
        }

        return [
            'user_id' => $user->user_id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}




