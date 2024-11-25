@extends('admin.layout')

@section('content')
<div class="dashboard">
    <h1>داشبورد مدیریتی</h1>

    <div class="stats">
        <div class="stat-box">
            <h2>{{ $totalOrders }}</h2>
            <p>کل سفارشات</p>
        </div>
        <div class="stat-box">
            <h2>{{ $totalRevenue }} تومان</h2>
            <p>کل درآمد</p>
        </div>
        <div class="stat-box">
            <h2>{{ $totalProducts }}</h2>
            <p>محصولات موجود</p>
        </div>
        <div class="stat-box">
            <h2>{{ $totalUsers }}</h2>
            <p>تعداد کاربران</p>
        </div>
    </div>

    <h2>آخرین سفارشات</h2>
    <table class="latest-orders">
        <thead>
            <tr>
                <th>شماره سفارش</th>
                <th>کاربر</th>
                <th>تاریخ</th>
                <th>مبلغ</th>
                <th>وضعیت</th>
            </tr>
        </thead>
        <tbody>
            @foreach($latestOrders as $order)
                <tr>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->user->name ?? 'ناشناس' }}</td>
                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                    <td>{{ $order->total_price }} تومان</td>
                    <td>{{ $order->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
