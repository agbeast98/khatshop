@extends('admin.layout')

@section('content')
    <h1>لیست سفارش‌ها</h1>
    <a href="{{ route('orders.create') }}" class="btn btn-primary">افزودن سفارش جدید</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>شماره سفارش</th>
                <th>مشتری</th>
                <th>تاریخ ثبت</th>
                <th>قیمت کل</th>
                <th>وضعیت</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->order_number }}</td>
                    <td>{{ $order->user->first_name }} {{ $order->user->last_name }}</td>
                    <td>{{ $order->order_date }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-info">جزئیات</a>
                        <a href="#" class="btn btn-sm btn-warning">ویرایش</a>
                        <form action="#" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
