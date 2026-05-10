<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    // 管理者ログイン画面の表示
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // 管理者ログイン処理
    public function login(Request $request)
    {
        // バリデーション
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // 認証（role=0 のユーザーだけ許可）
        $credentials = $request->only('email', 'password');

        if (Auth::attempt(array_merge($credentials, ['role' => 0]))) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/novel');
        }

        return back()->withErrors([
            'email' => '管理者として認証できませんでした。',
        ]);
    }

    // 管理者ログアウト
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/admin/login');
    }
}
