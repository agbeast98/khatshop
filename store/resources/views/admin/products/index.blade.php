@extends('admin.layout')

@section('content')
    <h1>لیست محصولات</h1>
    <div>
        <a href="{{ route('products.create') }}" class="button">ایجاد محصول جدید</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>نام محصول</th>
                <th>قیمت</th>
                <th>تصویر اصلی</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price, 2) }} تومان</td>
                    if($product->main_image)
                <img src="{{ asset('storage/' . $product->main_image) }}" alt="{{ $product->name }}" style="width: 100px;">
                    <td>
                    <a href="{{ route('admin.products.show', $product->id) }}" class="button">نمایش</a>
                        <a href="{{ route('products.edit', $product) }}" class="button">ویرایش</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="button button-danger">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
