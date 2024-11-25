@extends('admin.layout')

@section('content')
<div class="report">
    <h1>پرفروش‌ترین محصولات</h1>

    <table class="products">
        <thead>
            <tr>
                <th>نام محصول</th>
                <th>تعداد فروش</th>
                <th>قیمت</th>
            </tr>
        </thead>
        <tbody>
            @foreach($topProducts as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->orders_count }}</td>
                    <td>{{ number_format($product->price) }} تومان</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
