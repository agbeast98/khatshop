@extends('admin.layout')

@section('content')
    <h1>داشبورد مدیریت</h1>
    <div class="row">
        <!-- کارت آمار کاربران -->
        <div class="col-md-3">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">کاربران</h5>
                    <p class="card-text">{{ $data['users_count'] }} نفر</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('users.index') }}" class="text-white">مشاهده کاربران</a>
                </div>
            </div>
        </div>
        <!-- کارت آمار محصولات -->
        <div class="col-md-3">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">محصولات</h5>
                    <p class="card-text">{{ $data['products_count'] }} عدد</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('products.index') }}" class="text-white">مشاهده محصولات</a>
                </div>
            </div>
        </div>
        <!-- کارت آمار سفارش‌ها -->
        <div class="col-md-3">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">سفارش‌ها</h5>
                    <p class="card-text">{{ $data['orders_count'] }} سفارش</p>
                </div>
                <div class="card-footer">
                    <a href="{{ route('orders.index') }}" class="text-white">مشاهده سفارش‌ها</a>
                </div>
            </div>
        </div>
        <!-- کارت آمار فروش -->
        <div class="col-md-3">
            <div class="card text-white bg-danger mb-3">
                <div class="card-body">
                    <h5 class="card-title">فروش کل</h5>
                    <p class="card-text">{{ number_format($data['total_sales'], 2) }} تومان</p>
                </div>
                <div class="card-footer">
                    <a href="#" class="text-white">جزئیات فروش</a>
                </div>
            </div>
        </div>
    </div>
@endsection
