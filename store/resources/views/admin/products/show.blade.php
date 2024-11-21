@extends('admin.layout')

@section('content')
    <h1>نمایش محصول</h1>

    <p>نام: {{ $product->name }}</p>
    <p>توضیحات: {{ $product->description }}</p>
    <p>قیمت: {{ $product->price }}</p>
    <p>موجودی: {{ $product->stock }}</p>

    <a href="{{ route('products.index') }}">بازگشت به لیست</a>
@endsection
