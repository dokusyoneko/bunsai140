<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NovelController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\NewsController;


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
Route::post('/novels', [NovelController::class, 'store'])
    ->name('novels.store');


Route::middleware('auth')->group(function () {
Route::post('/novels/{novel}/like', [LikeController::class, 'toggle'])
    ->name('novels.like');
});


// 執筆を始める
Route::get('/novel_create', [CreateController::class, 'create'])
->name('novel.create');
Route::post('/novel_create', [CreateController::class, 'store'])
->name('novel.store');
Route::get('/novel_create/thanks', [CreateController::class, 'thanks'])
->name('novel.thanks');


// 書斎
Route::get('/mypage', [MypageController::class, 'index'])
    ->middleware('auth')
    ->name('mypage.index');
Route::get('/mypage/edit', [MypageController::class, 'edit'])->name('mypage.edit');
Route::post('/mypage/update', [MypageController::class, 'update'])->name('mypage.update');

// お知らせ
Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');

Route::get('/', function () {
    return redirect('/novel');
});

