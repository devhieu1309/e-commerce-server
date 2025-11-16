<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWarrantyRequest extends FormRequest
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
            'serial_number'   => 'required|string|max:100|unique:warranty,serial_number',
            'warranty_status' => 'required|in:Còn bảo hành,Hết hạn bảo hành',
            'warranty_start'  => 'required|date',
            'warranty_expiry' => 'nullable|date|after_or_equal:warranty_start',
            'branch'          => 'nullable|string|max:100',
            'description'     => 'nullable|string',
            'product_id'      => 'required|exists:products,product_id',
        ];
    }

    public function messages()
    {
        return [
            'serial_number.required'   => 'Serial number không được để trống.',
            'serial_number.string'   => 'Serial number phải là chuỗi hợp lệ.',
            'serial_number.max'   => 'Serial number không được vượt quá 100 ký tự.',
            'serial_number.unique'   => 'Serial number đã tồn tại.',

            'warranty_status.required' => 'Trạng thái bảo hành không được để trống.',
            'warranty_status.in'       => 'Trạng thái bảo hành không hợp lệ.',

            'warranty_start.required' => 'Ngày bắt đầu bảo hành không được để trống.',
            'warranty_start.date' => 'Ngày bắt đầu bảo hành phải là định dạng ngày hợp lệ.',
            
            'warranty_expiry.date' => 'Ngày kết thúc bảo hành phải là định dạng ngày hợp lệ.',
            'warranty_expiry.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu.',

            'branch.string'   => 'Tên chi nhánh phải là chuỗi hợp lệ.',
            'branch.max'   => 'Tên chi nhánh không được vượt quá 100 ký tự.',

            'description.string' => 'Mô tả bảo hành sản phẩm phải là chuỗi hợp lệ.',

            'product_id.required' => 'Sản phẩm bảo hành không được để trống.',
            'product_id.exists'        => 'Sản phẩm không tồn tại.',
        ];
    }
}
