<?php

namespace App\Http\Controllers;

use App\Models\Novel;
use Illuminate\Http\Request;

class NovelController extends Controller
{
    public function index()
    {
        $novels = Novel::with('user')->latest()->get();
        return view('index', compact('novels'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'body' => 'required|string|max:140',
    ]);

    $novel = new Novel();
    $novel->user_id = auth()->id();
    $novel->body = $validated['body'];

    // ボタンによって draft を切り替え
    if ($request->action === 'draft') {
        $novel->draft = 1;   // 下書き
    } else {
        $novel->draft = 0;   // 公開
    }

    $novel->save();

    return redirect()->route('mypage.index')
        ->with('success', $novel->draft ? '下書きに保存しました' : '投稿しました');
}

}
