@extends('layout')

@section('content')
    <h1>ویرایش محصول</h1>

    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label>نام:</label>
            <input type="text" name="name" value="{{ $product->name }}">
        </div>
        <div>
            <label>توضیحات:</label>
            <textarea name="description">{{ $product->description }}</textarea>
        </div>
        <div>
            <label>قیمت:</label>
            <input type="text" name="price" value="{{ $product->price }}">
        </div>
        <div>
            <label>موجودی:</label>
            <input type="number" name="stock" value="{{ $product->stock }}">
        </div>
        <button type="submit">ذخیره</button>
    </form>
@endsection
