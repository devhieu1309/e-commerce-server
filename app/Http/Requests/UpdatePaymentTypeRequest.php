<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePaymentTypeRequest extends FormRequest
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
            //
            'value' => 'string|required|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'value.string' => 'Tiêu đề phải là chuỗi',
            'value.required' => 'Tiêu đề không được để trống',
            'value.max' => 'Tiêu đề không được vượt quá 100 ký tự',

            'image.image' => 'Tệp tải lên phải là ảnh',
            'image.mimes' => 'Ảnh phải có định dạng: jpeg, png, jpg, gif, svg',
            'image.max' => 'Kích thước ảnh không được vượt quá 2MB',
        ];
    }
}
