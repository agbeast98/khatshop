<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // گرفتن محصولات از دیتابیس (اختیاری: گرفتن 8 محصول جدید)
        $products = Product::latest()->take(8)->get();

        // ارسال محصولات به ویو
        return view('user.home', compact('products'));
    }
}
