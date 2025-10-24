<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Người dùng có được phép gửi request này không?
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Quy tắc xác thực dữ liệu cho đăng ký.
     */
    public function rules(): array
    {
        return [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255|unique:users,email',
            'phone'    => 'required|string|max:20',
            'password' => 'required|string|min:6',
        ];
    }

    /**
     * Thông báo lỗi tùy chỉnh.
     */
    public function messages(): array
    {
        return [
            'name.required'      => 'Vui lòng nhập họ và tên.',
            'email.required'     => 'Vui lòng nhập email.',
            'email.email'        => 'Email không hợp lệ.',
            'email.unique'       => 'Email này đã được sử dụng.',
            'phone.required'     => 'Vui lòng nhập số điện thoại.',
            'password.required'  => 'Vui lòng nhập mật khẩu.',
            'password.min'       => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
        ];
    }
}
