<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Exception;
use Socialite;
use Illuminate\Support\Str;


class FacebookSocialiteController extends Controller
{
    public function redirectToFacebook()
    {
        // redirect user to "login with Facebook account" page
        $url = Socialite::driver('facebook')->stateless()->redirect()->getTargetUrl();
        return response()->json(['url' => $url]);
        // return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            // Sử dụng stateless() vì API không dùng session
            $facebookUser = Socialite::driver('facebook')->stateless()->user();

            // dd($facebookUser->getId());
            // Tìm user trong database
            $user = User::where('social_id', $facebookUser->getId())
                ->where('social_type', 'facebook')
                ->first();

            // dd($user);

            if (!$user) {
                // Nếu chưa có user, tạo mới
                $user = User::create([
                    'name' => $facebookUser->getName(),
                    'email' => $facebookUser->getEmail(),
                    'social_id' => $facebookUser->getId(),
                    'social_type' => 'facebook',
                    'password' => bcrypt(Str::random(16)), // random password
                ]);
                // dd($user);
            }

            // Nếu bạn dùng Sanctum hoặc Passport để xác thực API:
            $token = $user->createToken('facebook_token')->plainTextToken;

            // Trả về JSON cho React
            // return response()->json([
            //     'success' => true,
            //     'token' => $token,
            //     'user' => $user,
            // ]);

            return redirect()->away(env('FRONTEND_URL') . "?token={$token}&user={$user->user_id}");
        } catch (Exception $e) {
            // return response()->json([
            //     'success' => false,
            //     'message' => 'Facebook login failed',
            //     'error' => $e->getMessage(),
            // ], 500);
            dd($e->getMessage());
            // return redirect()->away(env('FRONTEND_URL') . '/login?error=facebook_auth_failed');
        }
    }
}
