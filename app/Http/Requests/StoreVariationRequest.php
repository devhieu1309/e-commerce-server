<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVariationRequest extends FormRequest
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
            'variation_name' => 'required|string|max:100',
            'category_id' => 'required|exists:categories,category_id',
        ];
    }

    public function messages(): array
    {
        return [
            'variation_name.required' => 'Tên biến thể là bắt buộc.',
            'variation_name.string' => 'Tên biến thể phải là chuỗi.',
            'variation_name.max' => 'Tên biến thể không được vượt quá 100 ký tự.',
            'category_id.required' => 'Danh mục là bắt buộc.',
            'category_id.exists' => 'Danh mục không tồn tại trong hệ thống.',
        ];
    }
}
