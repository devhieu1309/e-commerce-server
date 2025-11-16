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
        // lấy user_id từ route
        $id = $this->route('user');

        return [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255|unique:users,email,' . $id . ',user_id',
            'phone'    => 'nullable|string|max:20',
            'role'     => 'nullable|string|max:50',
            'password' => 'nullable|string|min:6',
        ];
    }
}
