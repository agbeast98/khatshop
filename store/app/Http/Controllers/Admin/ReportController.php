<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function financial(Request $request)
    {
        $type = $request->input('type', 'daily');

        switch ($type) {
            case 'daily':
                $start = Carbon::today();
                $end = Carbon::tomorrow();
                break;
            case 'monthly':
                $start = Carbon::now()->startOfMonth();
                $end = Carbon::now()->endOfMonth();
                break;
            case 'yearly':
                $start = Carbon::now()->startOfYear();
                $end = Carbon::now()->endOfYear();
                break;
            default:
                $start = Carbon::today();
                $end = Carbon::tomorrow();
        }

        $orders = Order::whereBetween('created_at', [$start, $end])->get();
        $totalRevenue = $orders->sum('total_price');
        $totalOrders = $orders->count();

        return view('admin.reports.financial', compact('orders', 'totalRevenue', 'totalOrders', 'type'));
    }

    public function topSelling()
    {
        $topProducts = Product::with('orders')
            ->withCount('orders')
            ->orderBy('orders_count', 'desc')
            ->take(10)
            ->get();

        return view('admin.reports.top_selling', compact('topProducts'));
    }

    public function newUsers()
    {
        $newUsers = User::where('created_at', '>=', Carbon::now()->subMonth())->get();

        return view('admin.reports.new_users', compact('newUsers'));
    }
}
