<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
        $categoryId = $this->route('id');

        return [
            'category_name' => "required|string|max:100|unique:categories,category_name,$categoryId,category_id",
            'description'   => 'required|string|max:2000',
        ];
    }

    public function messages(): array
    {
        return [
            'category_name.required' => 'Tên danh mục không được để trống.',
            'category_name.max' => 'Tên danh mục không được vượt quá 100 ký tự.',
            'category_name.unique' => 'Tên danh mục đã tồn tại.',
            'description.required' => 'Mô tả không được để trống.',
            'description.string' => 'Mô tả phải là chuỗi ký tự hợp lệ.',
            'description.max' => 'Mô tả không được vượt quá 2000 ký tự.',
        ];
    }
}
