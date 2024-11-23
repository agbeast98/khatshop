<?php

use Illuminate\Support\Facades\Route;

// ================================
// مسیرهای مدیریت (Admin)
// ================================
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;

// مسیرهای دسته‌بندی‌ها
Route::resource('admin/categories', CategoryController::class);

// مسیرهای کاربران مدیریت
Route::prefix('admin')->group(function () {
    Route::resource('users', UserController::class);
});

// مسیرهای سفارشات
Route::prefix('admin')->group(function () {
    Route::resource('orders', OrderController::class);
});

// مسیرهای تنظیمات
Route::prefix('admin')->group(function () {
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'store'])->name('settings.store');
});

// مسیرهای داشبورد
Route::prefix('admin')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
});

// مسیرهای محصولات مدیریت
Route::prefix('admin')->group(function () {
    Route::resource('products', ProductController::class);
});
