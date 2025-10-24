<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBannerRequest extends FormRequest
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
            'title' => 'string|required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link_url' => 'string|required|max:500',
            'position' => 'in:home,product|required',
            'is_active' => 'boolean|required',
        ];
    }

    public function messages(): array
    {
        return [
            'title.string' => 'Tiêu đề phải là chuỗi',
            'title.required' => 'Tiêu đề không được để trống',
            'title.max' => 'Tiêu đề không được vượt quá 255 ký tự',

            'image.image' => 'Tệp tải lên phải là ảnh',
            'image.mimes' => 'Ảnh phải có định dạng: jpeg, png, jpg, gif, svg',
            'image.max' => 'Kích thước ảnh không được vượt quá 5MB',
            'image.required' => 'Ảnh không được để trống',

            'link_url.string' => 'Đường dẫn liên kết phải là chuỗi',
            'link_url.required' => 'Đường dẫn liên kết không được để trống',
            'link_url.max' => 'Đường dẫn liên kết không được vượt quá 500 ký tự',

            'position.in' => 'Vị trí phải là một trong các giá trị: home, product',
            'position.required' => 'Vị trí không được để trống',

            'is_active.boolean' => 'Trạng thái kích hoạt phải là boolean',
            'is_active.required' => 'Trạng thái kích hoạt không được để trống',
        ];
    }
}
