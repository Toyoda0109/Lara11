<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm() {
        return view('login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'string', 'email:filter'],
            'password' => ['required', 'string'],
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();

            return to_route('member.posts.index');
        }

        return back()->withErrors([
            'email' => 'メールアドレスかパスワードが間違っています。',
        ])->onlyInput('email');
    }
    
    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return to_route('login')->with('status', 'ログアウトしました');
    }
}
