<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\PaymentType;
use App\Models\Address;
use App\Models\ShippingMethod;
use App\Models\Order_Status;
use App\Models\CustomerAddress;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ShoppingOrder>
 */
class ShoppingOrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->value('user_id'),
            'order_date' => $this->faker->dateTimeBetween('-2 months', 'now'),
            'payment_type_id' => PaymentType::inRandomOrder()->value('payment_type_id'),
            'address_id' => Address::inRandomOrder()->value('address_id'),
            'customer_address_id' => CustomerAddress::inRandomOrder()->value('customer_address_id'),
            'shipping_method_id' => ShippingMethod::inRandomOrder()->value('shipping_method_id'),
            'order_total' => $this->faker->randomFloat(2, 100000, 10000000),
            'order_status_id' => Order_Status::inRandomOrder()->value('order_status_id'),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
