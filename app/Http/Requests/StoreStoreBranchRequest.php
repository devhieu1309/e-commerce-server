<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStoreBranchRequest extends FormRequest
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
        return [
            'name' => 'required|string|max:255|unique:store_branches,name',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|max:80|unique:store_branches,email',
            'opening_hours' => 'required|string|max:50',
            'address_id' => 'required|exists:addresses,address_id',
            'map_link' => 'required|url|max:200',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên chi nhánh không được để trống.',
            'name.string' => 'Tên chi nhánh phải là chuỗi ký tự hợp lệ.',
            'name.max' => 'Tên chi nhánh không được vượt quá 255 ký tự.',
            'name.unique' => 'Tên chi nhánh đã tồn tại.',
            
            'phone_number.required' => 'Số điện thoại không được để trống.',
            'phone_number.string' => 'Số điện thoại phải là chuỗi hợp lệ.',
            'phone_number.max' => 'Số điện thoại không được vượt quá 20 ký tự.',

            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email phải có định dạng hợp lệ.',
            'email.max' => 'Email không được vượt quá 80 ký tự.',
            'email.unique' => 'Email đã tồn tại.',
            
            'opening_hours.required' => 'Giờ mở cửa không được để trống.',
            'opening_hours.string' => 'Giờ mở cửa phải là chuỗi hợp lệ.',
            'opening_hours.max' => 'Giờ mở cửa không được vượt quá 50 ký tự.',

            'address_id.required' => 'Địa chỉ chi nhánh không được để trống.',
            'address_id.exists' => 'Địa chỉ chi nhánh không tồn tại trong hệ thống.',

            'map_link.required' => 'Đường dẫn bản đồ không được để trống.',
            'map_link.url' => 'Đường dẫn bản đồ phải là một URL hợp lệ.',
            'map_link.max' => 'Đường dẫn bản đồ không được vượt quá 200 ký tự.',
            
        ];
    
    }
}
