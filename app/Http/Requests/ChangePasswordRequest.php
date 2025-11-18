<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ChangePasswordRequest extends FormRequest
{
    /**
     * Xác định quyền gọi request này.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Quy tắc kiểm tra dữ liệu đầu vào.
     */
    public function rules(): array
    {
        return [
            'old_password' => ['required'],
            'new_password' => ['required', 'min:8'],
            'confirm_password' => ['required', 'same:new_password'],
        ];
    }

    /**
     * Thông báo lỗi tùy chỉnh (tiếng Việt).
     */
    public function messages(): array
    {
        return [
            'old_password.required'     => 'Vui lòng nhập mật khẩu cũ.',
            'new_password.required'     => 'Vui lòng nhập mật khẩu mới.',
            'new_password.min'          => 'Mật khẩu mới phải có ít nhất 8 ký tự.',
            'confirm_password.required' => 'Vui lòng xác nhận lại mật khẩu.',
            'confirm_password.same'     => 'Mật khẩu xác nhận không khớp với mật khẩu mới.',
        ];
    }

    /**
     * Sau khi xác thực rule cơ bản xong, kiểm tra thêm xem mật khẩu cũ có đúng không.
     */
    protected function passedValidation()
    {
        $userId = $this->route('id');
        $user = User::find($userId);

        if (!$user) {
            abort(response()->json([
                'success' => false,
                'message' => 'Không tìm thấy người dùng.'
            ], 404));
        }

        if (!Hash::check($this->old_password, $user->password)) {
            abort(response()->json([
                'success' => false,
                'errors' => [
                    'old_password' => ['Mật khẩu cũ không chính xác.']
                ]
            ], 422));
        }
    }
}
