<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Novel;
use App\Models\User;

class MypageController extends Controller
{
    /**
     * 書斎トップページ
     */
    public function index(Request $request)
    {
        $user = auth()->user();

        $tab = $request->query('tab', 'works');

        return view('mypage', [
            'user' => $user,
            'tab' => $tab,
            'novels' => $user->novels()->where('draft', 0)->latest()->get(),
            'favorites' => $user->likes()->with('novel.user')->get(),
            'drafts' => $user->novels()->where('draft', 1)->latest()->get(),
        ]);
    }



    /**
     * プロフィール編集画面
     */
    public function edit()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    /**
     * プロフィール更新処理
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'profile_message' => 'nullable|string|max:500',
            'avatar' => 'nullable|image|max:2048',
        ]);

        // 名前・紹介文の更新
        $user->name = $validated['name'];
        $user->profile_message = $validated['profile_message'] ?? null;

        // アイコン画像の更新
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }

        $user->save();

        return redirect()->route('mypage.index')->with('success', 'プロフィールを更新しました');
    }
}
