<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoReviewRequest extends FormRequest
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
        $rules = [
            'product_id' => 'required|exists:products,product_id',
            'title'      => 'required|string|min:5|max:255',
            'is_visible'  => 'boolean',
            'source_type' => 'required|in:youtube,upload',
        ];

        // Nếu là video từ youTube
        if ($this->input('source_type') === 'youtube') {
            $rules['url'] = [
                'required',
                'string',
                'regex:/^(https?:\/\/)?(www\.)?(youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)[A-Za-z0-9_\-]{6,}/i'
            ];
        }

        // Nếu là video upload từ máy
        if ($this->input('source_type') === 'upload') {
            $rules['video'] = 'required|file|mimes:mp4,mov,avi,mkv|max:51200';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'product_id.required' => 'Vui lòng chọn sản phẩm.',
            'product_id.exists' => 'Sản phẩm không tồn tại.',
            'title.required' => 'Tiêu đề không được để trống.',
            'title.min' => 'Tiêu đề phải có ít nhất :min ký tự.',
            'title.max' => 'Tiêu đề không được vượt quá :max ký tự.',
            'url.required' => 'Vui lòng nhập đường dẫn video.',
            'url.string'   => 'Đường dẫn video phải là chuỗi ký tự.',
            'url.regex' => 'Đường dẫn video không hợp lệ.',
            'source_type.required'=> 'Vui lòng chọn loại nguồn video.',
            'source_type.in'      => 'Loại nguồn video không hợp lệ.',
            'video.required'      => 'Vui lòng chọn file video để upload.',
            'video.mimes'         => 'Chỉ chấp nhận file mp4, mov, avi hoặc mkv.',
            'video.max'           => 'Dung lượng tối đa là 50MB.',
        ];
    }
}
