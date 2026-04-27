<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Novel;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    // 投稿画面
    public function create()
    {
        return view('novel_create');
    }

    // 投稿処理
    public function store(Request $request)
    {
        $validated = $request->validate([
            'body' => 'required|string|max:140',
        ]);

        $novel = new Novel();
        $novel->user_id = Auth::id();
        $novel->body = $validated['body'];

        // 下書き or 公開
        if ($request->action === 'draft') {
            $novel->draft = 1; // 下書き
            $novel->save();
            return redirect()->route('mypage.index')->with('success', '下書きに保存しました');
        }

        // 公開投稿
        $novel->draft = 0;
        $novel->save();

        // 投稿完了画面へ
        return redirect()->route('novel.thanks');
    }

    // 投稿完了画面
    public function thanks()
    {
        return view('thanks');
    }
}
