<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserReviewRequest extends FormRequest
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
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
            'user_id' => 'required|exists:users,user_id',
            'shop_order_id' => 'required|exists:shopping_order,shop_order_id',
        ];
    }

    public function messages(): array
    {
        return [
            'rating.required' => 'Bạn chưa chọn số sao đánh giá.',
            'rating.integer' => 'Số sao đánh giá phải là một số nguyên.',
            'rating.min' => 'Bạn chưa chọn số sao đánh giá.',
            'rating.max' => 'Số sao đánh giá phải nhỏ hơn hoặc bằng 5.',

            'comment.string' => 'Bình luận phải là một chuỗi ký tự.',
            'comment.max' => 'Bình luận không được vượt quá 1000 ký tự.',
            'comment.required' => 'Vui lòng nhập bình luận của bạn.',

            'user_id.required' => 'Vui lòng đăng nhập để đánh giá.',
            'user_id.exists' => 'Bạn chưa đăng nhập để đánh giá.',

            'shop_order_id.required' => 'Bạn chưa mua hàng để đánh giá.',

        ];
    }
}
