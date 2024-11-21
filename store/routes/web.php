<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// مسیر اصلی (صفحه خوش‌آمدگویی)
Route::get('/', function () {
    return view('welcome');
});
Route::resource('admin/categories', 'Admin\CategoryController');

use App\Http\Controllers\Admin\CategoryController;

Route::resource('admin/categories', CategoryController::class);

use App\Http\Controllers\Admin\UserController;

Route::prefix('admin')->group(function () {
    Route::resource('users', UserController::class);
});
use App\Http\Controllers\Admin\OrderController;

Route::prefix('admin')->group(function () {
    Route::resource('orders', OrderController::class);
});


// گروه‌بندی مسیرهای مدیریت با پیشوند 'admin'
Route::prefix('admin')->group(function () {
    Route::resource('products', ProductController::class);
});
