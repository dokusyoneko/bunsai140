<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Novel;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    // 投稿画面（新規 or 編集）
    public function create(Request $request)
    {
        $editId = $request->query('edit'); // ?edit=◯◯ を取得
        $novel = null;

        // 編集モード
        if ($editId) {
            $novel = Novel::where('id', $editId)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        }

        return view('novel_create', compact('novel'));
    }

    // 新規投稿
    public function store(Request $request)
    {
        $validated = $request->validate([
            'body' => 'required|string|max:140',
        ]);

        $novel = new Novel();
        $novel->user_id = Auth::id();
        $novel->body = $validated['body'];

        // 下書き保存
        if ($request->action === 'draft') {
            $novel->draft = 1;
            $novel->save();
            return redirect()->route('mypage.index')->with('success', '下書きに保存しました');
        }

        // 公開投稿
        $novel->draft = 0;
        $novel->save();

        return redirect()->route('novel.thanks');
    }

    // 編集更新
    public function update(Request $request, Novel $novel)
    {
        // 自分の作品以外は編集不可
        if ($novel->user_id !== Auth::id()) {
            abort(403);
        }

        $validated = $request->validate([
            'body' => 'required|string|max:140',
        ]);

        $novel->body = $validated['body'];

        // 下書き更新
        if ($request->action === 'draft') {
            $novel->draft = 1;
            $novel->save();
            return redirect()->route('mypage.index')->with('success', '下書きを更新しました');
        }

        // 公開更新
        $novel->draft = 0;
        $novel->save();

        return redirect()->route('novel.thanks');
    }

    // 投稿完了画面
    public function thanks()
    {
        return view('thanks');
    }
}
