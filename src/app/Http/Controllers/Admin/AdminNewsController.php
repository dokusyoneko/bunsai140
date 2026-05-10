<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;

class AdminNewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('admin.news', compact('news'));
    }
}
