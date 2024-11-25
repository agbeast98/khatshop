<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',   // نام
        'last_name',    // نام خانوادگی
        'email',        // ایمیل
        'phone',        // شماره موبایل
        'role',         // نقش کاربر (مثلاً admin, customer, employee)
        'avatar',       // تصویر پروفایل
        'password',     // رمز عبور
    ];

    protected $hidden = [
        'password',        // مخفی کردن رمز عبور
        'remember_token',  // مخفی کردن توکن Remember Me
    ];

    protected $casts = [
        'email_verified_at' => 'datetime', // تبدیل تاریخ تایید ایمیل
    ];

    /**
     * دسترسی آسان به نقش‌های کاربر
     */
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isCustomer()
    {
        return $this->role === 'customer';
    }

    public function isEmployee()
    {
        return $this->role === 'employee';
    }

    /**
     * مسیر تصویر پروفایل
     */
    public function getAvatarPathAttribute()
    {
        return $this->avatar ? asset('storage/avatars/' . $this->avatar) : asset('images/default-avatar.png');
    }
}
