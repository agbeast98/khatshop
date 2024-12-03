<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalOrders = Order::count();
        $totalRevenue = Order::sum('total_price');
        $totalProducts = Product::count();
        $totalUsers = User::count();
        $latestOrders = Order::latest()->take(5)->get();

        return view('admin.dashboard', compact('totalOrders', 'totalRevenue', 'totalProducts', 'totalUsers', 'latestOrders'));
    }
}
