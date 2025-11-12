<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;


class AddressController extends Controller
{
    /**
     * Lấy danh sách địa chỉ người dùng
     */
    public function index(Request $request)
    {
        $query = Address::with(['country', 'province', 'district', 'ward']);

        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        $addresses = $query->orderByDesc('isDefault')->get();

        $addresses = $addresses->map(function ($item) {
            return [
                'address_id'       => $item->address_id,
                'user_id'          => $item->user_id,
                'name'             => $item->name,
                'phone'            => $item->phone,
                'company'          => $item->company,
                'detailed_address' => $item->detailed_address,
                'zip'              => $item->zip,
                'isDefault'        => (bool) $item->isDefault,
                'provinces_id'     => $item->provinces_id,
                'districts_id'     => $item->districts_id,
                'wards_id'         => $item->wards_id,
                'province_name'    => $item->province->name ?? null,
                'district_name'    => $item->district->name ?? null,
                'ward_name'        => $item->ward->name ?? null,
                'country_name'     => $item->country->name ?? 'Việt Nam',
            ];
        });

        return response()->json($addresses);
    }

    /**
     * Thêm địa chỉ mới
     */
    public function store(StoreAddressRequest $request)
    {
        $data = $request->validated();

        if (!empty($data['isDefault'])) {
            Address::where('user_id', $data['user_id'])->update(['isDefault' => false]);
            $data['isDefault'] = true;
        } else {
            $data['isDefault'] = false;
        }

        $address = Address::create($data)->load(['country', 'province', 'district', 'ward']);

        return response()->json([
            'message' => 'Thêm địa chỉ thành công!',
            'data' => [
                ...$address->toArray(),
                'province_name' => $address->province->name ?? null,
                'district_name' => $address->district->name ?? null,
                'ward_name'     => $address->ward->name ?? null,
                'country_name'  => $address->country->name ?? 'Việt Nam',
            ]
        ], 201);
    }

    /**
     * Cập nhật địa chỉ
     */
    // public function update(StoreAddressRequest $request, $id)
    // {
    //     $address = Address::findOrFail($id);
    //     $data = $request->validated();
    //     $address->update($data);
    //     $address->load(['country', 'province', 'district', 'ward']);

    //     return response()->json([
    //         'message' => 'Cập nhật địa chỉ thành công!',
    //         'data' => [
    //             ...$address->toArray(),
    //             'province_name' => $address->province->name ?? null,
    //             'district_name' => $address->district->name ?? null,
    //             'ward_name'     => $address->ward->name ?? null,
    //             'country_name'  => $address->country->name ?? 'Việt Nam',
    //         ]
    //     ]);
    // }
    public function update(UpdateAddressRequest $request, $id)
    {
        $address = Address::findOrFail($id);
        $data = $request->validated();

        // 🔹 Nếu cập nhật địa chỉ này thành mặc định
        if (!empty($data['isDefault']) && $data['isDefault'] == true) {
            // Bỏ mặc định tất cả địa chỉ khác của cùng user
            Address::where('user_id', $address->user_id)
                ->where('address_id', '!=', $address->address_id)
                ->update(['isDefault' => false]);
            $data['isDefault'] = true;
        } else {
            // Nếu không tích mặc định thì chỉ cập nhật các trường còn lại
            $data['isDefault'] = false;
        }

        // Cập nhật địa chỉ hiện tại
        $address->update($data);
        $address->load(['country', 'province', 'district', 'ward']);

        return response()->json([
            'message' => 'Cập nhật địa chỉ thành công!',
            'data' => [
                ...$address->toArray(),
                'province_name' => $address->province->name ?? null,
                'district_name' => $address->district->name ?? null,
                'ward_name'     => $address->ward->name ?? null,
                'country_name'  => $address->country->name ?? 'Việt Nam',
            ]
        ]);
    }


    /**
     * Xóa địa chỉ
     */
    public function destroy($id)
    {
        $address = Address::findOrFail($id);

        if ($address->isDefault) {
            return response()->json([
                'message' => 'Không thể xóa địa chỉ mặc định. Hãy đặt địa chỉ khác làm mặc định trước.'
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
        $address = Address::findOrFail($id);

        Address::where('user_id', $address->user_id)
            ->where('isDefault', true)
            ->update(['isDefault' => false]);

        $address->update(['isDefault' => true]);
        $address->load(['country', 'province', 'district', 'ward']);

        return response()->json([
            'message' => 'Đặt địa chỉ mặc định thành công!',
            'data' => [
                ...$address->toArray(),
                'province_name' => $address->province->name ?? null,
                'district_name' => $address->district->name ?? null,
                'ward_name'     => $address->ward->name ?? null,
                'country_name'  => $address->country->name ?? 'Việt Nam',
            ]
        ]);
    }
}
