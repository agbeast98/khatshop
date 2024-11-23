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
use App\Http\Controllers\Admin\SettingController;

Route::prefix('admin')->group(function () {
    // مسیر نمایش فرم تنظیمات
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');

    // مسیر ذخیره تنظیمات
    Route::post('settings', [SettingController::class, 'store'])->name('settings.store');
});


use App\Http\Controllers\Admin\DashboardController;

Route::prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    // سایر روت‌ها مانند کاربران، سفارش‌ها و تنظیمات
});



// گروه‌بندی مسیرهای مدیریت با پیشوند 'admin'
Route::prefix('admin')->group(function () {
    Route::resource('products', ProductController::class);
});
