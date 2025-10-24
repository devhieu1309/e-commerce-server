<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255|unique:users,email',
            'phone'    => 'nullable|string|max:20',
            'role'     => 'nullable|string|max:50',
            'password' => 'required|string|min:6',
        ];
    }

    /**
     * Các thông báo lỗi tùy chỉnh.
     */
    public function messages(): array
    {
        return [
            'name.required'     => 'Vui lòng nhập họ và tên.',
            'email.required'    => 'Vui lòng nhập email.',
            'email.email'       => 'Email không hợp lệ.',
            'email.unique'      => 'Email này đã được sử dụng.',
            'phone.max'         => 'Số điện thoại không được vượt quá 20 ký tự.',
            'role.max'          => 'Tên quyền không được vượt quá 50 ký tự.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min'      => 'Mật khẩu phải có ít nhất 6 ký tự.',
        ];
    }
}
