<?php

namespace App\Http\Controllers;

use App\Models\Novel;
use Illuminate\Http\Request;

class NovelController extends Controller
{
    public function index(Request $request)
    {
        $tab = $request->query('tab', 'new'); // デフォルトは新着

        // 新着
        if ($tab === 'new') {
            $novels = Novel::with('user')
                ->where('draft', 0)
                ->orderBy('created_at', 'desc')
                ->get();
        }

        // 人気（月）＝ 過去30日
        elseif ($tab === 'month') {
            $novels = Novel::with('user')
                ->where('draft', 0)
                ->withCount(['likes' => function ($query) {
                    $query->where('created_at', '>=', now()->subDays(30));
                }])
                ->orderBy('likes_count', 'desc')
                ->get();
        }

        // 人気（全期間）
        elseif ($tab === 'all') {
            $novels = Novel::with('user')
                ->where('draft', 0)
                ->withCount('likes')
                ->orderBy('likes_count', 'desc')
                ->get();
        }

        return view('index', compact('novels', 'tab'));
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

    public function destroy(Novel $novel)
    {
        // 自分の作品だけ削除可能
        if ($novel->user_id !== auth()->id()) {
            abort(403);
        }

        $novel->delete();

        return redirect()->back()->with('message', '削除しました');
    }


}
