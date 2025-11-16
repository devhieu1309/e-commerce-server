<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePromotionRequest extends FormRequest
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
            'promotion_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('promotions', 'promotion_name')->ignore($this->route('promotion'), 'promotion_id'),
            ],
            'discount_code' => [
                'nullable',
                'string',
                'max:50',
                Rule::unique('promotions', 'discount_code')->ignore($this->route('promotion'), 'promotion_id'),
            ],
            'description' => 'nullable|string',
            'discount_rate' => 'required|numeric|min:0|max:100',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after:start_date',
        ];
    }
    public function messages(): array
    {
        return [
            'promotion_name.required' => 'Tên chương trình khuyến mãi không được để trống.',
            'promotion_name.string' => 'Tên chương trình khuyến mãi phải là chuỗi ký tự hợp lệ.',
            'promotion_name.max' => 'Tên chương trình khuyến mãi không được vượt quá 255 ký tự.',
            'promotion_name.unique' => 'Tên chương trình khuyến mãi đã tồn tại.',

            'discount_code.string' => 'Mã giảm giá phải là chuỗi ký tự hợp lệ.',
            'discount_code.max' => 'Mã giảm giá không được vượt quá 50 ký tự.',
            'discount_code.unique' => 'Mã giảm giá đã tồn tại.',

            'description.string' => 'Mô tả chương trình khuyến mãi phải là chuỗi ký tự hợp lệ.',

            'discount_rate.required' => 'Tỷ lệ giảm giá không được để trống.',
            'discount_rate.numeric' => 'Tỷ lệ giảm giá phải là một số hợp lệ.',
            'discount_rate.min' => 'Tỷ lệ giảm giá không được nhỏ hơn 0%.',
            'discount_rate.max' => 'Tỷ lệ giảm giá không được lớn hơn 100%.',

            'start_date.required' => 'Ngày bắt đầu không được để trống.',
            'start_date.date' => 'Ngày bắt đầu phải là định dạng ngày hợp lệ.',

            'end_date.date' => 'Ngày kết thúc phải là định dạng ngày hợp lệ.',
            'end_date.after' => 'Ngày kết thúc phải sau ngày bắt đầu.',
        ];
    }
}
