<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password'])
        ]);

        $user->sendEmailVerificationNotification();

        return redirect('/email/verify');

        // Auth::login($user);

        // $user->profile()->create([
        //     'post_code' => '',
        //     'address' => ''
        // ]);

        // return redirect('/mypage/profile');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/');
        };

        return back()->withErrors([
            'login_error' => 'ログイン情報が登録されていません',
        ])->onlyInput('email');
    }

    public function destroy(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
