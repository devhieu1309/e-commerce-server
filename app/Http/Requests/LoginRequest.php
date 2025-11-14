<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Cho phép tất cả người dùng gửi request này.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Quy tắc validate cho đăng nhập.
     */
    public function rules(): array
    {
        return [
            'email'    => 'required|email|max:255',
            'password' => 'required|string|min:6',
        ];
    }

    /**
     * Thông báo lỗi tùy chỉnh (để hiển thị ra FE).
     */
    public function messages(): array
    {
        return [
            'email.required'    => 'Vui lòng nhập email.',
            'email.email'       => 'Email không hợp lệ.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min'      => 'Mật khẩu phải có ít nhất 6 ký tự.',
        ];
    }

    /**
     * Tùy chỉnh phản hồi JSON khi validate thất bại.
     */
    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = response()->json([
            'status'  => false,
            'message' => $validator->errors()->first(), // Lấy lỗi đầu tiên
            'errors'  => $validator->errors(),
        ], 422);

        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}
