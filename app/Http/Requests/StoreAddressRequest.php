<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
{
    /**
     * Xác định ai có quyền gửi request này.
     */
    public function authorize(): bool
    {
        // Cho phép mọi user gửi request (nếu có Auth, có thể thay bằng auth()->check())
        return true;
    }

    /**
     * Các rule để validate dữ liệu gửi lên.
     */
    public function rules(): array
    {
        return [
            'user_id'           => 'required|exists:users,user_id',
            'name'              => 'required|string|max:255',
            'phone'             => 'required|string|max:20',
            'company'           => 'nullable|string|max:255',
            'detailed_address'  => 'required|string|max:255',
            'countries_id'      => 'nullable|exists:countries,countries_id',
            'provinces_id' => 'required|integer|exists:provinces,provinces_id',
            'districts_id' => 'required|integer|exists:districts,districts_id',
            'wards_id'     => 'required|integer|exists:wards,wards_id',
            'zip'               => 'nullable|string|max:10',
            'isDefault'         => 'boolean',
        ];
    }

    /**
     * Thông báo lỗi tùy chỉnh (hiển thị thân thiện hơn).
     */
    public function messages(): array
    {
        return [
            'user_id.required'         => 'Thiếu thông tin người dùng.',
            'user_id.exists'           => 'Người dùng không hợp lệ.',
            'name.required'            => 'Vui lòng nhập họ tên.',
            'phone.required'           => 'Vui lòng nhập số điện thoại.',
            'detailed_address.required' => 'Vui lòng nhập địa chỉ chi tiết.',
            'provinces_id.exists'      => 'Tỉnh/Thành không hợp lệ.',
            'districts_id.exists'      => 'Quận/Huyện không hợp lệ.',
            'wards_id.exists'          => 'Phường/Xã không hợp lệ.',
        ];
    }
}
