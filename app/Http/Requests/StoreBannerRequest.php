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
        // Nếu là update (PATCH/PUT) thì image có thể nullable
        if ($this->isMethod('patch') || $this->isMethod('put')) {
            return [
                'title' => 'string|required|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'link_url' => 'string|required|max:500',
                'position' => 'in:home,product|required',
                'is_active' => 'boolean|required',
            ];
        }

        // Nếu là create (POST)
        return [
            'title' => 'string|required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link_url' => 'string|required|max:500',
            'position' => 'in:home,product|required',
            'is_active' => 'boolean|required',
        ];
    }
}
