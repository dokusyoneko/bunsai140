<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Novel;
use App\Models\User;
use App\Http\Requests\ProfileRequest;

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
    public function update(ProfileRequest $request)
    {
        $user = Auth::user();

        $data = $request->validated();

        // 名前・紹介文の更新
        $user->name = $data['name'];
        $user->profile_message = $data['profile_message'] ?? null;

        // アイコン画像の更新
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $path;
        }

        $user->save();

        return redirect()->route('mypage.index')->with('success', 'プロフィールを更新しました');
    }
}
