<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAddressRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'              => 'required|string|max:255',
            'phone'             => 'required|string|max:20',
            'company'           => 'nullable|string|max:255',
            'detailed_address'  => 'required|string|max:255',
            'countries_id'      => 'nullable|exists:countries,countries_id',
            'provinces_id'      => 'required|integer|exists:provinces,provinces_id',
            'wards_id'          => 'required|integer|exists:wards,wards_id',
            'zip'               => 'nullable|string|max:10',
            'isDefault'         => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'             => 'Vui lòng nhập họ tên.',
            'phone.required'            => 'Vui lòng nhập số điện thoại.',
            'detailed_address.required' => 'Vui lòng nhập địa chỉ chi tiết.',
            'provinces_id.required'     => 'Vui lòng chọn tỉnh/thành phố.',
            'wards_id.required'         => 'Vui lòng chọn phường/xã.',
        ];
    }
}
