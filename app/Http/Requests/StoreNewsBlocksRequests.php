<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewsBlocksRequests extends FormRequest
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

            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'position' => 'required|integer|min:0',
            'news_id' => 'required|exists:news,id',

        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Tiêu đề không được để trống.',
            'title.max' => 'Tiêu đề tối đa 255 ký tự.',

            'content.required' => 'Nội dung không được để trống.',

            'image.image' => 'Tệp tải lên phải là ảnh',
            'image.mimes' => 'Ảnh phải có định dạng: jpeg, png, jpg, gif, svg',
            'image.max' => 'Kích thước ảnh không được vượt quá 5MB',
            'image.required' => 'Ảnh không được để trống',

            'position.required' => 'Vị trí không được để trống.',
            'position.integer' => 'Vị trí phải là số nguyên.',

            'news_id.required' => 'Phải chọn tin tức liên kết.',
            'news_id.exists' => 'Tin tức liên kết không tồn tại.',
        ];
    }
}
