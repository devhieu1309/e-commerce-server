<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoReviewRequest extends FormRequest
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
            'product_id' => 'required|exists:products,id',
            'title'      => 'required|string|min:5|max:255',
            'url'        => [
                'required',
                'string',
                'regex:/^(https?:\/\/)?(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)[A-Za-z0-9_\-]{6,}/i'
            ],
            // 'url' => 'required|url',
            'is_visible' => 'boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'product_id.required' => 'Vui lòng chọn sản phẩm.',
            'product_id.exists' => 'Sản phẩm không tồn tại.',
            'title.required' => 'Tiêu đề không được để trống.',
            'title.min' => 'Tiêu đề phải có ít nhất :min ký tự.',
            'title.max' => 'Tiêu đề không được vượt quá :max ký tự.',
            'url.required' => 'Vui lòng nhập đường dẫn video.',
            'url.string'   => 'Đường dẫn video phải là chuỗi ký tự.',
            'url.regex' => 'Đường dẫn video không hợp lệ.',
        ];
    }
}
