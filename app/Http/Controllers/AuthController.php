<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

class AuthController extends Controller
{
    /**
     * Chức năng sử lý đăng ký.
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
        $credentials = $request->validated();

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json([
                'status'  => false,
                'message' => 'Email hoặc mật khẩu không đúng!'
            ], 401);
        }

        // Nếu muốn tạo token API (nếu dùng Sanctum)
        $token = $user->createToken('api-token')->plainTextToken;

        return response()->json([
            'status' => true,
            'message' => 'Đăng nhập thành công!',
            'user' => $user,
            'token' => $token
        ]);
    }
}
