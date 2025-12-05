<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Address;
use Carbon\Carbon;

class CustomerAddressSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {

            $address = Address::inRandomOrder()->first();

            DB::table('customer_addresses')->insert([
                'user_id' => $user->user_id,
                'name' => $user->name,
                'phone' => $user->phone ?? '0000000000',
                'detailed_address' => $address->detailed_address,
                'provinces_id' => $address->provinces_id ?? null,
                'wards_id' => $address->wards_id ?? null,
                'isDefault' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
