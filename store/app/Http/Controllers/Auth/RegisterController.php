<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|regex:/^09[0-9]{9}$/|unique:users,phone',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'phone.regex' => 'فرمت شماره موبایل باید به صورت 09123456789 باشد.',
            'password.confirmed' => 'رمز عبور و تایید آن یکسان نیستند.',
        ]);

        User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'ثبت‌نام با موفقیت انجام شد.');
    }
}
