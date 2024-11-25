@extends('admin.layout')

@section('content')
<div class="report">
    <h1>گزارش مالی - {{ $type == 'daily' ? 'روزانه' : ($type == 'monthly' ? 'ماهانه' : 'سالانه') }}</h1>

    <div class="stats">
        <div class="stat-box">
            <h2>{{ $totalOrders }}</h2>
            <p>تعداد سفارشات</p>
        </div>
        <div class="stat-box">
            <h2>{{ number_format($totalRevenue) }} تومان</h2>
            <p>کل درآمد</p>
        </div>
    </div>

    <h2>جزئیات سفارشات</h2>
    <table class="orders">
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
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->user->name ?? 'ناشناس' }}</td>
                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                    <td>{{ number_format($order->total_price) }} تومان</td>
                    <td>{{ $order->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
