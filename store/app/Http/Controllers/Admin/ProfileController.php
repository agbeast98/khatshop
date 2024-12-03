<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        // دریافت اطلاعات کاربر وارد شده
        $user = Auth::user();

        // ارسال اطلاعات کاربر به نمای پروفایل
        return view('admin.profile', compact('user'));
    }
}
