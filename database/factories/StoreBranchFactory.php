<?php

namespace Database\Factories;

use App\Models\Address;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\StoreBranch>
 */
class StoreBranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    { 

        return [
            'name' => 'DracoPhone - CN ' . $this->faker->streetName(),
            'phone_number' => $this->faker->numerify('09########'),
            'email' => $this->faker->unique()->word() . '@dracophone.vn', 
            'opening_hours' => '08:00 - 21:00',
            'address_id' => Address::inRandomOrder()->value('address_id') ?? 1,
            'map_link' => $this->faker->randomElement([
                'https://goo.gl/maps/FxFoQ2vRvxzZ7Sdd6', 
                'https://goo.gl/maps/B6m3eQXo5nsPqG2m7', 
                'https://goo.gl/maps/XtFYc3cWrBt2GzJP7', 
                'https://goo.gl/maps/v6XKgyEpK3sWeK4k7', 
                'https://goo.gl/maps/JG6TuFMdH2tEFkYg8', 
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
