@extends('layout')

@section('content')
    <h1>افزودن محصول جدید</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div>
            <label>نام:</label>
            <input type="text" name="name">
        </div>
        <div>
            <label>توضیحات:</label>
            <textarea name="description"></textarea>
        </div>
        <div>
            <label>قیمت:</label>
            <input type="text" name="price">
        </div>
        <div>
            <label>موجودی:</label>
            <input type="number" name="stock">
        </div>
        <button type="submit">ذخیره</button>
    </form>
@endsection
