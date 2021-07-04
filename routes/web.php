<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\ShowProfile;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::view('login/page', 'login.login')->name('login');
Route::view('register/page', 'login.register')->name('register');

// 首頁
Route::get('/', [IndexController::class, 'index'])->name('index');

//改變blog狀態，發布or不發布
route::patch('blogs/{id}', [BlogController::class, 'status'])->name('blogs.status');

// blog資源控制器
Route::resource('blogs', BlogController::class)->except(['index']);

// 個人中心-個人信息-頁面
Route::get('user', [UserController::class, 'infoPage'])->name('user.info');

// 個人中心-個人信息-更新數據
Route::put('user', [UserController::class, 'infoUpdate'])->name('user.update');

// 個人中心-頭像-頁面
Route::get('user/avatar', [UserController::class, 'avatarPage'])->name('user.avatar');

// 個人中心-頭像-更新頭像
Route::patch('user/avatar', [UserController::class, 'avatarUpdate'])->name('user.avatar.update');

// 個人中心-所有blog
Route::get('user/blog', [UserController::class, 'blog'])->name('user.blog');

// 評論路由
Route::post('blogs/{id}/comment', CommentController::class)->name('blogs.comment');

// ********************************************************
// Route::get('/', function () {
//     dd('這是blogs首頁');
// })->name('index');

// // 這是顯示創建畫面
// Route::get('blogs/create', function () {
//     dd('這是blogs.create');
// })->name('blogs.create');


// // 這是展示單頁
// Route::get('blogs/{id}', function ($id) {
//     dd('這是blogs.show' . $id);
// })->name('blogs.show');

// // 這是發佈新文章
// Route::post('blogs', function () {
//     dd('這是blogs.store');
// })->name('blogs.store');

// // 這是顯示編輯畫面
// Route::get('blogs/{id}/edit', function ($id) {
//     dd('這是blogs.edit' . $id);
// })->name('blogs.edit');

// // 這是更新文章
// Route::put('blogs/{id}', function ($id) {
//     dd('這是blogs.update' . $id);
// })->name('blogs.update');

// // 這是刪除文章
// Route::delete('blogs/{id}', function ($id) {
//     dd('這是blogs.destroy' . $id);
// })->name('blogs.destroy');

// // 改變文章狀態，發布或不發布
// Route::patch('blogs/{id}', function ($id) {
//     dd('這是文章狀態' . $id);
// })->name('blogs.status');

// // 個人中心，修改個人訊息的畫面
// Route::get('user', function () {
//     dd('個人中心，修改個人訊息的畫面');
// })->name('user.info');

// // 個人中心，修改個人資料-數據
// Route::put('user', function () {
//     dd('個人中心，修改個人資料');
// })->name('user.update');

// // 個人中心，更換頭像的畫面
// Route::get('user/avatar', function () {
//     dd('個人中心，更換頭像的畫面');
// })->name('user.avatar');

// // 個人中心，更換頭像-數據
// Route::patch('user/avatar', function () {
//     dd('個人中心，更換頭像-數據');
// })->name('user.avatar.update');

// // 個人中心，我的文章
// Route::get('user/blog', function () {
//     dd('個人中心，我的文章');
// })->name('user.blog');

// 登入註冊會使用laravel內建的，就不寫路由了
