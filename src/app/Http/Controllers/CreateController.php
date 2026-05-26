<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Novel;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\NovelRequest;


class CreateController extends Controller
{
    public function create(Request $request)
    {
        $editId = $request->query('edit');
        $novel = null;

        if ($editId) {
            $novel = Novel::where('id', $editId)
            ->where('user_id', Auth::id())
            ->firstOrFail();
        }

        return view('novel_create', compact('novel'));
    }

    public function store(NovelRequest $request)
    {
        $data = $request->validated();

        $novel = new Novel();
        $novel->user_id = Auth::id();
        $novel->body = $data['body'];;

        if ($request->action === 'draft') {
            $novel->draft = 1;
            $novel->save();
            return redirect()->route('mypage.index')->with('success', '下書きに保存しました');
        }

        $novel->draft = 0;
        $novel->save();

        return redirect()->route('novel.thanks');
    }

    public function update(NovelRequest $request, Novel $novel)
    {
        if ($novel->user_id !== Auth::id()) {
            abort(403);
        }

        $data = $request->validated();
        $novel->body = $data['body'];

        if ($request->action === 'draft') {
            $novel->draft = 1;
            $novel->save();
            return redirect()->route('mypage.index')->with('success', '下書きを更新しました');
        }

        $novel->draft = 0;
        $novel->save();

        return redirect()->route('novel.thanks');
    }

    public function thanks()
    {
        return view('thanks');
    }
}
