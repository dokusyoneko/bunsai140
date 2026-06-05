<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NovelController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MypageController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminNovelController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

use Illuminate\Support\Facades\Artisan;



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


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);


Route::get('/novel', [NovelController::class, 'index']);
Route::post('/novels', [NovelController::class, 'store'])
    ->name('novels.store');
Route::delete('/novels/{novel}', [NovelController::class, 'destroy'])
    ->name('novels.destroy')
    ->middleware('auth');



Route::middleware('auth')->group(function () {
Route::post('/novels/{novel}/like', [LikeController::class, 'toggle'])
    ->name('novels.like');
});


Route::middleware('auth')->group(function () {
Route::get('/novel_create', [CreateController::class, 'create'])
->name('novel.create');
Route::post('/novel_create', [CreateController::class, 'store'])
->name('novel.store');
Route::get('/novel_create/thanks', [CreateController::class, 'thanks'])
->name('novel.thanks');
});
Route::put('/novel_update/{novel}', [CreateController::class, 'update'])
    ->name('novel.update');


Route::get('/mypage', [MypageController::class, 'index'])
    ->middleware('auth')
    ->name('mypage.index');
Route::get('/mypage/edit', [MypageController::class, 'edit'])->name('mypage.edit');
Route::post('/mypage/update', [MypageController::class, 'update'])->name('mypage.update');


Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');

Route::get('/', function () {
    return redirect('/novel');
});


Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.post');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

Route::prefix('admin')
    ->middleware(['auth', 'admin'])
    ->group(function () {

        Route::get('/novel', [AdminNovelController::class, 'index']);
        Route::post('/novel/{id}/delete', [AdminNovelController::class, 'delete'])
            ->name('admin.novel.delete');

        Route::post('/novel/{id}/restore', [AdminNovelController::class, 'restore'])
            ->name('admin.novel.restore');

        Route::get('/user', [AdminUserController::class, 'index']);
        Route::post('/user/{id}/ban', [AdminUserController::class, 'ban'])->name('admin.user.ban');
        Route::post('/user/{id}/unban', [AdminUserController::class, 'unban'])->name('admin.user.unban');

        Route::get('/news', [AdminNewsController::class, 'index'])->name('admin.news.index');
        Route::post('/news/store', [AdminNewsController::class, 'store'])->name('admin.news.store');
        Route::post('/news/{id}/delete', [AdminNewsController::class, 'delete'])->name('admin.news.delete');

    });

Route::get('/reset-db', function () {
    Artisan::call('migrate:fresh --seed --force');
    return 'Database has been reset!';
});
