<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

// مسیر اصلی (صفحه خوش‌آمدگویی)
Route::get('/', function () {
    return view('welcome');
});

// مدیریت محصولات با Resource Controller
Route::prefix('admin')->group(function () {
    Route::resource('products', ProductController::class);
});
