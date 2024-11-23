@extends('admin.layout')

@section('content')
    <h1>جزئیات محصول</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text"><strong>نام انگلیسی:</strong> {{ $product->english_name }}</p>
            <p class="card-text"><strong>برند:</strong> {{ $product->brand }}</p>
            <p class="card-text"><strong>قیمت:</strong> {{ number_format($product->price, 2) }} تومان</p>
            @if($product->discount_price)
                <p class="card-text"><strong>قیمت تخفیف خورده:</strong> {{ number_format($product->discount_price, 2) }} تومان</p>
                <p class="card-text"><strong>تاریخ انقضای تخفیف:</strong> {{ $product->discount_expiry }}</p>
            @endif
            <p class="card-text"><strong>موجودی انبار:</strong> {{ $product->stock }}</p>
            <p class="card-text"><strong>توضیحات:</strong> {{ $product->description }}</p>
            <p class="card-text"><strong>توضیحات کوتاه:</strong> {{ $product->short_description }}</p>
            <p class="card-text"><strong>برچسب‌ها:</strong> {{ implode(', ', json_decode($product->tags, true) ?? []) }}</p>
            <p class="card-text"><strong>دسته‌بندی‌ها:</strong> {{ implode(', ', json_decode($product->categories, true) ?? []) }}</p>
        </div>
    </div>
    <a href="{{ route('products.index') }}" class="btn btn-primary mt-3">بازگشت به لیست محصولات</a>
@endsection
