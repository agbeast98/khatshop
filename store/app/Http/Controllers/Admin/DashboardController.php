<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;
use App\Models\Order;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'users_count' => User::count(),
            'products_count' => Product::count(),
            'orders_count' => Order::count(),
            'total_sales' => Order::sum('total_price'),
        ];

        // نمودار فروش ماهانه
        $salesData = $this->getMonthlySales();

        // نمودار تعداد سفارش‌ها
        $ordersData = $this->getMonthlyOrders();

        // جدیدترین کاربران و سفارش‌ها
        $latestUsers = User::latest()->take(5)->get();
        $latestOrders = Order::latest()->take(5)->get();

        return view('admin.dashboard.index', compact('data', 'salesData', 'ordersData', 'latestUsers', 'latestOrders'));
    }

    private function getMonthlySales()
    {
        $months = [];
        $totals = [];
        for ($i = 0; $i < 12; $i++) {
            $month = Carbon::now()->subMonths($i);
            $months[] = $month->format('Y-m');
            $totals[] = Order::whereYear('created_at', $month->year)
                             ->whereMonth('created_at', $month->month)
                             ->sum('total_price');
        }

        return [
            'months' => array_reverse($months),
            'totals' => array_reverse($totals),
        ];
    }

    private function getMonthlyOrders()
    {
        $months = [];
        $counts = [];
        for ($i = 0; $i < 12; $i++) {
            $month = Carbon::now()->subMonths($i);
            $months[] = $month->format('Y-m');
            $counts[] = Order::whereYear('created_at', $month->year)
                             ->whereMonth('created_at', $month->month)
                             ->count();
        }

        return [
            'months' => array_reverse($months),
            'counts' => array_reverse($counts),
        ];
    }
}
