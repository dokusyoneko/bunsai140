<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Novel;

class AdminNovelController extends Controller
{
    public function index()
    {
        $novels = Novel::withTrashed()->get();
        return view('admin.index', compact('novels'));
    }
}
