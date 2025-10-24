<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrderStatusRequest extends FormRequest
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
            'status' => 'string|required|max:100'
        ];
    }

    public function messages(): array
    {
        return [
            'status.string' => 'Trạng thái phải là chuỗi',
            'status.required' => 'Trạng thái không được để trống',
            'status.max' => 'Trạng thái không được vượt quá 100 ký tự',
            'status.unique' => 'Tên trạng thái đã tồn tại',
        ];
    }
}
