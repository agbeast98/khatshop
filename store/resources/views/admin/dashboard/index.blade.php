@extends('admin.layout')

@section('content')
    <h1>داشبورد مدیریت</h1>
    <div class="row">
        <!-- کارت آمار -->
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

    <!-- نمودارها -->
    <div class="row mt-4">
        <div class="col-md-6">
            <h4>نمودار فروش ماهانه</h4>
            <canvas id="salesChart"></canvas>
        </div>
        <div class="col-md-6">
            <h4>نمودار سفارش‌ها</h4>
            <canvas id="ordersChart"></canvas>
        </div>
    </div>

    <!-- جدیدترین کاربران و سفارش‌ها -->
    <div class="row mt-4">
        <div class="col-md-6">
            <h4>جدیدترین کاربران</h4>
            <ul class="list-group">
                @foreach($latestUsers as $user)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $user->first_name }} {{ $user->last_name }}
                        <span>{{ $user->created_at->format('Y-m-d') }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-6">
            <h4>جدیدترین سفارش‌ها</h4>
            <ul class="list-group">
                @foreach($latestOrders as $order)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        سفارش {{ $order->order_number }}
                        <span>{{ $order->created_at->format('Y-m-d') }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    // نمودار فروش ماهانه
    const salesCtx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(salesCtx, {
        type: 'line',
        data: {
            labels: @json($salesData['months']),
            datasets: [{
                label: 'فروش ماهانه (تومان)',
                data: @json($salesData['totals']),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        }
    });

    // نمودار تعداد سفارش‌ها
    const ordersCtx = document.getElementById('ordersChart').getContext('2d');
    const ordersChart = new Chart(ordersCtx, {
        type: 'bar',
        data: {
            labels: @json($ordersData['months']),
            datasets: [{
                label: 'تعداد سفارش‌ها',
                data: @json($ordersData['counts']),
                backgroundColor: 'rgba(255, 159, 64, 0.2)',
                borderColor: 'rgba(255, 159, 64, 1)',
                borderWidth: 1
            }]
        }
    });
</script>
@endsection
