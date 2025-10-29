<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateWarrantyRequest extends FormRequest
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
            'serial_numble'   => 'sometimes|string|max:100', // chỉ validate nếu có gửi
            'warranty_status' => 'sometimes|in:Còn bảo hành,Hết hạn bảo hành',
            'warranty_start'  => 'nullable|date',
            'warranty_expiry' => 'nullable|date|after_or_equal:warranty_start',
            'branch'          => 'nullable|string|max:100',
            'description'     => 'nullable|string',
            'product_id'      => 'sometimes|exists:products,id', // chỉ validate nếu có gửi
        ];
    }

    public function messages()
    {
        return [
            'serial_numble.string'  => 'Serial number phải là chuỗi ký tự.',
            'serial_numble.max'     => 'Serial number tối đa 100 ký tự.',
            'warranty_status.in'    => 'Trạng thái bảo hành không hợp lệ.',
            'warranty_expiry.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu.',
            'product_id.exists'     => 'Sản phẩm không tồn tại.',
        ];
    }
}
