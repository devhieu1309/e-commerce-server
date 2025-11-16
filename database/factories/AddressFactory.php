<?php

namespace Database\Factories;

use App\Models\Province;
use App\Models\Ward;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Address>
 */
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Lấy ngẫu nhiên 1 tỉnh và 1 xã/phường
        // $province = Province::inRandomOrder()->first();
        // $ward = Ward::where('provinces_id', $province->provinces_id)
        //     ->inRandomOrder()
        //     ->first();

        // // Tạo địa chỉ chi tiết ngẫu nhiên
        // $street = $this->faker->streetAddress();


        // return [
        //     'detailed_address' => $this->faker->address(), // Địa chỉ tiếng Việt tự nhiên
        //     'provinces_id' => $this->faker->randomElement(Province::pluck('provinces_id')->toArray()),
        //     'wards_id' => $this->faker->randomElement(Ward::pluck('wards_id')->toArray()),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ];


        // Lấy ngẫu nhiên một xã/phường đã có trong DB
        $ward = Ward::inRandomOrder()->first();

        // Lấy tỉnh tương ứng với phường
        $provinceId = $ward->provinces_id ?? null;
        $province = $provinceId ? Province::find($provinceId) : Province::inRandomOrder()->first();

        // Sinh địa chỉ chi tiết tự nhiên
        $detailedAddress = $this->faker->buildingNumber . ' ' . $this->faker->streetName;

        return [
            'detailed_address' => $detailedAddress,
            'provinces_id' => $province?->provinces_id,
            'wards_id' => $ward?->wards_id,
        ];
    }
}
