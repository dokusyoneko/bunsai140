<?php

namespace App\Http\Controllers;

use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        // 最新順で取得
        $news = News::orderBy('created_at', 'desc')->get();

        return view('news', compact('news'));
    }
}
