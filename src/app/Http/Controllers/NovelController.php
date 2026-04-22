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
}
