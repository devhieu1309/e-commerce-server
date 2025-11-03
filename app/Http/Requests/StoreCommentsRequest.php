<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentsRequest extends FormRequest
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

            'fullname' => 'required|string|max:255',
            'email' => 'required|email|max:100',
            'content' => 'required|string|min:5',
            'news_id' => 'required|exists:news,id',
            'user_id' => 'nullable|exists:users,user_id',
        ];
    }
    public function messages(): array
    {
        return [
            'fullname.required' => 'Vui lòng nhập họ tên của bạn.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không hợp lệ.',
            'content.required' => 'Vui lòng nhập nội dung bình luận.',
            'content.min' => 'Nội dung bình luận phải có ít nhất 5 ký tự.',
            'news_id.required' => 'Thiếu ID bài viết.',
            'news_id.exists' => 'Bài viết không tồn tại.',
            'user_id.exists' => 'Người dùng không tồn tại.',
        ];
    }
}
