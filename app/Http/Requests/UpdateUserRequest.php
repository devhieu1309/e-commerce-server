<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('id');

        return [
            'name'     => 'sometimes|string|max:255',
            'email'    => "sometimes|email|max:255|unique:users,email,$id,user_id",
            'phone'    => 'sometimes|nullable|string|max:20',
            'role'     => 'sometimes|string|max:50',
            'password' => 'sometimes|nullable|string|min:6',
        ];
    }

    public function messages(): array
    {
        return [
            'email.unique' => 'Email này đã được sử dụng.',
            'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
        ];
    }
}
