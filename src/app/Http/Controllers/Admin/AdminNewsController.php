<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;


class AdminNewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('created_at', 'desc')->get();
        return view('admin.news', compact('news'));
    }


    public function store(NewsRequest $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        News::create([
            'title' => $request->title,
            'body' => $request->body,
            'important' => $request->is_important ? 1 : 0,
            'published_at' => now(),
        ]);

        return redirect()->back()->with('status', 'お知らせを配信しました');
    }

    public function delete($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->back()->with('status', 'お知らせを削除しました');
    }


}
