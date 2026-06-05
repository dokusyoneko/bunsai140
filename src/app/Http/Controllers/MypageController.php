<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Novel;
use App\Models\User;
use App\Http\Requests\ProfileRequest;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class MypageController extends Controller
{

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




    public function edit()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }


    public function update(ProfileRequest $request)
    {
        $user = Auth::user();

        $data = $request->validated();

        $user->name = $data['name'];
        $user->profile_message = $data['profile_message'] ?? null;

        if ($request->hasFile('avatar')) {
            $uploadedUrl = Cloudinary::upload(
                $request->file('avatar')->getRealPath(),
                ['folder' => 'avatars']
            )->getSecurePath();

            $user->avatar = $uploadedUrl;
        }

        $user->save();

        return redirect()->route('mypage.index')->with('success', 'プロフィールを更新しました');
    }
}
