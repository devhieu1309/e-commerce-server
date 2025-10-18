<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequests extends FormRequest
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
            'title' => 'string|required|max:255',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'title.string' => 'Tiêu đề phải là chuỗi',
            'title.required' => 'Tiêu đề không được để trống',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự',


            'cover_image.image' => 'Tệp tải lên phải là ảnh',
            'cover_image.mimes' => 'Ảnh phải có định dạng: jpeg, png, jpg, gif, svg',
            'cover_image.max' => 'Kích thước ảnh không được vượt quá 3MB',
        ];
    }
}
