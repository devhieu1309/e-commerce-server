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
            'serial_numble'   => 'required|string|max:100',
            'warranty_status' => 'required|in:Còn bảo hành,Hết hạn bảo hành',
            'warranty_start'  => 'nullable|date',
            'warranty_expiry' => 'nullable|date|after_or_equal:warranty_start',
            'branch'          => 'nullable|string|max:100',
            'description'     => 'nullable|string',
            'product_id'      => 'required|exists:products,id',
        ];
    }

    public function messages()
    {
        return [
            'serial_numble.required'   => 'Serial number là bắt buộc.',
            'warranty_status.required' => 'Trạng thái bảo hành là bắt buộc.',
            'warranty_status.in'       => 'Trạng thái bảo hành không hợp lệ.',
            'warranty_expiry.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu.',
            'product_id.exists'        => 'Sản phẩm không tồn tại.',
        ];
    }
}
