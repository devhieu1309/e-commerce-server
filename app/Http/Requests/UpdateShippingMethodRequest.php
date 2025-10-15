<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateShippingMethodRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $shippingMethodId = $this->route('id');

        return [
            'shipping_method_name' => "required|string|max:100|unique:shipping_methods,shipping_method_name,$shippingMethodId,shipping_method_id",
            'shipping_method_price'   => 'numeric|required|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'shipping_method_name.required' => 'Tên phương thức vận chuyển không được để trống.',
            'shipping_method_name.max' => 'Tên phương thức vận chuyển không được vượt quá 100 ký tự.',
            'shipping_method_name.unique' => 'Tên phương thức vận chuyển đã tồn tại.',
            'shipping_method_price.required' => 'Giá phương thức vận chuyển không được để trống.',
            'shipping_method_price.string' => 'Giá phương thức vận chuyển phải là số hợp lệ.',
            'shipping_method_price.min' => 'Giá phương thức vận chuyển không được nhỏ hơn 0.',
        ];
    }
}
