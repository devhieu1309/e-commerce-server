<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerAddress;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;

class AddressController extends Controller
{
    /**
     * Lấy danh sách địa chỉ người dùng
     */
    public function index(Request $request)
    {
        $query = CustomerAddress::with(['province', 'ward']);

        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        $addresses = $query->orderByDesc('isDefault')->get();

        $mapped = $addresses->map(function ($item) {
            return [
                'address_id'      => $item->customer_address_id,
                'user_id'         => $item->user_id,
                'name'            => $item->name,
                'phone'           => $item->phone,
                'company'         => $item->company,
                'detailed_address' => $item->detailed_address,
                'provinces_id'    => $item->provinces_id,
                'wards_id'        => $item->wards_id,
                'isDefault'       => (bool) $item->isDefault,
                'province_name'   => $item->province->name ?? null,
                'ward_name'       => $item->ward->name ?? null,
            ];
        });

        return response()->json($mapped);
    }


    /**
     * Thêm địa chỉ mới
     */
    public function store(StoreAddressRequest $request)
    {
        $data = $request->validated();

        if (!empty($data['isDefault'])) {
            CustomerAddress::where('user_id', $data['user_id'])->update(['isDefault' => false]);
            $data['isDefault'] = true;
        } else {
            $data['isDefault'] = false;
        }

        $address = CustomerAddress::create($data)->load(['province', 'ward']);

        return response()->json([
            'message' => 'Thêm địa chỉ thành công!',
            'data' => $address
        ], 201);
    }

    /**
     * Cập nhật địa chỉ
     */
    public function update(UpdateAddressRequest $request, $id)
    {
        $address = CustomerAddress::findOrFail($id);
        $data = $request->validated();

        if (!empty($data['isDefault'])) {
            CustomerAddress::where('user_id', $address->user_id)
                ->where('customer_address_id', '!=', $id)
                ->update(['isDefault' => false]);

            $data['isDefault'] = true;
        } else {
            $data['isDefault'] = false;
        }

        $address->update($data);
        $address->load(['province', 'ward']);

        return response()->json([
            'message' => 'Cập nhật địa chỉ thành công!',
            'data' => $address
        ]);
    }

    /**
     * Xóa địa chỉ
     */
    public function destroy($id)
    {
        $address = CustomerAddress::findOrFail($id);

        if ($address->isDefault) {
            return response()->json([
                'message' => 'Không thể xóa địa chỉ mặc định.'
            ], 422);
        }

        $address->delete();
        return response()->json(['message' => 'Xóa địa chỉ thành công!']);
    }

    /**
     * Đặt địa chỉ mặc định
     */
    public function setDefault($id)
    {
        $address = CustomerAddress::findOrFail($id);

        CustomerAddress::where('user_id', $address->user_id)
            ->update(['isDefault' => false]);

        $address->update(['isDefault' => true]);
        $address->load(['province', 'ward']);

        return response()->json([
            'message' => 'Đặt địa chỉ mặc định thành công!',
            'data' => $address
        ]);
    }
}
