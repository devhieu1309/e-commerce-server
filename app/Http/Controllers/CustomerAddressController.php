<?php

namespace App\Http\Controllers;

use App\Services\CustomerAddressService;
use Illuminate\Http\Request;
use Exception;

class CustomerAddressController extends Controller
{
    protected $customerAddressService;

    public function __construct(CustomerAddressService $customerAddressService)
    {
        $this->customerAddressService = $customerAddressService;
    }

    public function getAddressesByUser($userId)
    {
        try {
            $addresses = $this->customerAddressService->getAddressesByUserId($userId);
            return response()->json($addresses, 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function getDefaultAddress($userId)
    {
        try {
            $address = $this->customerAddressService->getDefaultAddressByUserId($userId);
            
            if (!$address) {
                return response()->json([
                    'success' => false,
                    'message' => 'Không tìm thấy địa chỉ mặc định',
                ], 404);
            }

            return response()->json($address, 200);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}