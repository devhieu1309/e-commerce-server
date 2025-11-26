<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Http\Requests\ForgotPasswordRequest;



class AuthController extends Controller
{
    /**
     * Xử lý đăng ký người dùng mới.
     */
    public function register(RegisterRequest $request)
    {
        // Lấy dữ liệu đã được xác thực
        $data = $request->validated();

        // Tạo người dùng mới
        $user = User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'phone'    => $data['phone'] ?? null,
            'role'     => 'Người Dùng',
            'password' => Hash::make($data['password']),
        ]);

        // Trả phản hồi JSON
        return response()->json([
            'status'  => true,
            'message' => 'Đăng ký thành công!',
            'user'    => $user,
        ], 201);
    }


    /**
     * Xử lý đăng nhập người dùng.
     */
    public function login(LoginRequest $request)
    {
        $request->validate([
            'email'    => 'required',
            'password' => 'required'
        ]);

        $loginInput = $request->email;

        // ================
        // 1. ADMIN LOGIN (username)
        // ================
        if (!str_contains($loginInput, '@')) {

            $user = User::where('email', $loginInput)
                ->where('role', 'admin')
                ->first();

            if (!$user) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Tài khoản admin không tồn tại!'
                ], 401);
            }

            // Check tài khoản có bị khóa không
            if (!$user->is_active) {
                return response()->json([
                    'status' => false,
                    'message' => 'Tài khoản của bạn đã bị khóa'
                ], 403);
            }

            // Check mật khẩu
            if (!Hash::check($request->password, $user->password)) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Mật khẩu không đúng!'
                ], 401);
            }
        }

        // ================
        // 2. USER LOGIN (email)
        // ================
        else {

            $user = User::where('email', $loginInput)->first();

            if (!$user) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Email không tồn tại!'
                ], 401);
            }

            // Check tài khoản bị khóa
            if (!$user->is_active) {
                return response()->json([
                    'status' => false,
                    'message' => 'Tài khoản của bạn đã bị khóa'
                ], 403);
            }

            // Check mật khẩu
            if (!Hash::check($request->password, $user->password)) {
                return response()->json([
                    'status'  => false,
                    'message' => 'Email hoặc mật khẩu không đúng!'
                ], 401);
            }
        }

        // ================
        // LOGIN THÀNH CÔNG
        // ================
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'status'  => true,
            'message' => 'Đăng nhập thành công!',
            'user'    => $user,
            'token'   => $token
        ]);

        if (!$user->is_active) {
            return response()->json([
                'status' => false,
                'message' => 'Tài khoản của bạn đã bị khóa'
            ], 403);
        }
    }


    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $email = $request->validated()['email'];
        $user = User::where('email', $email)->first();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'Email không tồn tại trong hệ thống.'
            ], 404);
        }

        // Tạo mật khẩu ngẫu nhiên
        $newPassword = Str::random(10);

        // Gửi email cho người dùng
        Mail::raw("Mật khẩu mới của bạn là: {$newPassword}", function ($message) use ($email) {
            $message->to($email)
                ->subject('Khôi phục mật khẩu - Dolaphone');
        });

        // Cập nhật mật khẩu mới trong database
        $user->update(['password' => Hash::make($newPassword)]);

        return response()->json([
            'status' => true,
            'message' => 'Mật khẩu mới đã được gửi đến email của bạn!'
        ]);
    }
}
