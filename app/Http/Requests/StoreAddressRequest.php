<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAddressRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Cho phép request này chạy
    }

    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'company' => 'nullable|string|max:255',
            'address' => 'required|string|max:500',
            'city' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'ward' => 'required|string|max:255',
            'zip' => 'nullable|string|max:20',
            'is_default' => 'boolean'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Hãy điền Họ và Tên',
            'phone.required' => 'Hãy nhập Số điện thoại',
            'address.required' => 'Hãy nhập Địa chỉ',
            'city.required' => 'Hãy chọn Tỉnh / Thành phố',
            'district.required' => 'Hãy chọn Quận / Huyện',
            'ward.required' => 'Hãy chọn Phường / Xã',
        ];
    }
}
