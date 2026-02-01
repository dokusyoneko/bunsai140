<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NovelController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/novel', [NovelController::class, 'index']);


// 執筆を始める
Route::get('/novel_create', function () {
    return view('novel_create');
});

// 書斎
Route::get('/mypage', function () {
    return view('mypage');
});

// お知らせ
Route::get('/news', function () {
    return view('news');
});

// 入室（ログイン）
Route::get('/login', function () {
    return view('login');
});
