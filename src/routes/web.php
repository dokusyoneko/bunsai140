<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NovelController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MypageController;


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

Route::middleware('auth')->group(function () {
Route::post('/novels/{novel}/like', [LikeController::class, 'toggle'])
    ->name('novels.like');
});


// 執筆を始める
Route::get('/novel_create', function () {
    return view('novel_create');
});

Route::get('/novel_create/thanks', function () {
    return view('thanks');
});


// 書斎
Route::get('/mypage', [MypageController::class, 'index'])
    ->middleware('auth');

// お知らせ
Route::get('/news', function () {
    return view('news');
});

Route::get('/', function () {
    return redirect('/novel');
});

