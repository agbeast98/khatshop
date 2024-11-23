<?php


// ================================
// مسیرهای مدیریت (Admin)
// ================================
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\ContactController;
use App\Http\Controllers\User\AboutController;

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
    Route::resource('products', AdminProductController::class);
});


//user :

Route::get('/', [HomeController::class, 'index'])->name('home');

// محصولات
Route::get('/products', [UserProductController::class, 'index'])->name('user.products.index');
Route::get('/products/{product}', [UserProductController::class, 'show'])->name('user.products.show');

// صفحه تماس با ما
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

// صفحه درباره ما
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

// مسیرهای احراز هویت (مثال)
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');
