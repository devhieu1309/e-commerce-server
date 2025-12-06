<?php

namespace App\Repositories;

use App\Models\CustomerAddress;

class CustomerAddressRepository
{

    public function getAddressesByUserId($userId)
    {
        return CustomerAddress::where('user_id', $userId)
            ->orderByDesc('isDefault')  
            ->orderByDesc('created_at')
            ->get();
    }

    public function getDefaultAddressByUserId($userId)
    {
        return CustomerAddress::where('user_id', $userId)
            ->where('isDefault', 1)
            ->first();
    }
}