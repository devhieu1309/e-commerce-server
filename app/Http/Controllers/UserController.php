<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return response()->json($users);
    }

    // public function store(StoreUserRequest $request)
    // {
    //     $validated = $request->validated();
    //     $user = User::create($validated);

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Người dùng đã được tạo thành công.',
    //         'data' => $user
    //     ], 201);
    // }

    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();

        // Mã hóa mật khẩu trước khi lưu
        if (isset($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        }

        $user = User::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Người dùng đã được tạo thành công.',
            'data' => $user
        ], 201);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json([
            'success' => true,
            'message' => 'Xóa người dùng thành công',
            'deleted_id' => $id
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validated();

        // Nếu password rỗng thì bỏ qua
        if (empty($data['password'])) {
            unset($data['password']);
        }

        $user->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Cập nhật người dùng thành công.',
            'data' => $user
        ]);
    }


    public function search(Request $request)
    {
        $query = $request->query('query');

        $users = User::where('name', 'LIKE', "%$query%")
            ->orWhere('email', 'LIKE', "%$query%")
            ->orWhere('phone', 'LIKE', "%$query%")
            ->get();

        return response()->json([
            'status' => true,
            'data' => $users
        ]);
    }
    
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy người dùng.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $user,
        ]);
    }



    public function changePassword(ChangePasswordRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Đổi mật khẩu thành công.',
        ]);
    }
}
