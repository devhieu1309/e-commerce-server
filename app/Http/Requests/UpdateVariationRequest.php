<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVariationRequest extends FormRequest
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
        $variationId = $this->route('id');

        return [
            'variation_name' => "required|string|max:100|unique:variations,variation_name,{$variationId},variation_id",
            'category_id'    => 'required|exists:categories,category_id',
        ];
    }

    public function messages(): array
    {
        return [
            // Tên biến thể
            'variation_name.required' => 'Tên biến thể là bắt buộc.',
            'variation_name.string'   => 'Tên biến thể phải là chuỗi ký tự.',
            'variation_name.max'      => 'Tên biến thể không được vượt quá 100 ký tự.',
            'variation_name.unique'   => 'Tên biến thể đã tồn tại trong hệ thống.',

            // Danh mục
            'category_id.required' => 'Danh mục là bắt buộc.',
            'category_id.exists'   => 'Danh mục không tồn tại trong hệ thống.',
        ];
    }
}
