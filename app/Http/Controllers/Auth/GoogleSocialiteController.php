<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Exception;
use Socialite;
use Illuminate\Support\Str;


class GoogleSocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        // redirect user to "login with Google account" page
        $url = Socialite::driver('google')->stateless()->redirect()->getTargetUrl();
        return response()->json(['url' => $url]);
        // return Socialite::driver('google')->redirect();
    }

    public function handleCallback()
    {
        try {
            // Sử dụng stateless() vì API không dùng session
            $googleUser = Socialite::driver('google')->stateless()->user();

            // Tìm user trong database
            $user = User::where('social_id', $googleUser->getId())
                ->where('social_type', 'google')
                ->first();

            if (!$user) {
                // Nếu chưa có user, tạo mới
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'social_id' => $googleUser->getId(),
                    'social_type' => 'google',
                    'password' => bcrypt(Str::random(16)), // random password
                ]);
            }

            // Nếu bạn dùng Sanctum hoặc Passport để xác thực API:
            $token = $user->createToken('google_token')->plainTextToken;

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
            //     'message' => 'Google login failed',
            //     'error' => $e->getMessage(),
            // ], 500);
            return redirect()->away(env('FRONTEND_URL') . '/login?error=google_auth_failed');
        }
    }

    // public function handleCallback()
    // {
    //     try {
    //         $user = Socialite::driver('google')->user();

    //         // find user in the database where the social id is the same with the id provided by Google
    //         $finduser = User::where('social_id', $user->id)->first();



    //         if ($finduser)  // if user found then do this
    //         {
    //             // Log the user in
    //             Auth::login($finduser);
    //             // redirect user to dashboard page

    //             return redirect('/dashboard');
    //         } else {

    //             // create user data with their Google account data
    //             $newUser = User::create([
    //                 'name' => $user->name,
    //                 'email' => $user->email,
    //                 'social_id' => $user->id,
    //                 'social_type' => 'google',  // the social login is using google
    //                 'password' => bcrypt('my-google'),  // fill password by whatever pattern you choose

    //             ]);

    //             Auth::login($newUser);
    //             return redirect('/dashboard');
    //         }
    //     } catch (Exception $e) {

    //         dd($e->getMessage());
    //     }
    // }
}
