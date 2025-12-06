<?php

namespace App\Services;

use App\Repositories\CustomerAddressRepository;

class CustomerAddressService
{
    protected $repo;

    public function __construct(CustomerAddressRepository $repo)
    {
        $this->repo = $repo;
    }

    // Lấy danh sách địa chỉ của user
    public function getAddressesByUserId($userId)
    {
        $addresses = $this->repo->getAddressesByUserId($userId);

        return $addresses->map(function ($address) {
            return [
                'customer_address_id' => $address->customer_address_id,
                'name' => $address->name,
                'phone' => $address->phone,
                'detailed_address' => $address->detailed_address,
                'provinces_id' => $address->provinces_id,
                'wards_id' => $address->wards_id,
                'isDefault' => (bool) $address->isDefault,
            ];
        });
    }

    // Lấy địa chỉ mặc định
    public function getDefaultAddressByUserId($userId)
    {
        $address = $this->repo->getDefaultAddressByUserId($userId);

        if (!$address) {
            return null;
        }

        return [
            'customer_address_id' => $address->customer_address_id,
            'name' => $address->name,
            'phone' => $address->phone,
            'detailed_address' => $address->detailed_address,
            'provinces_id' => $address->provinces_id,
            'wards_id' => $address->wards_id,
            'isDefault' => (bool) $address->isDefault,
        ];
    }
}