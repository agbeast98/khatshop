@extends('admin.layout')

@section('content')
    <h1>لیست محصولات</h1>
    <table class="table">
        <thead>
            <tr>
                <th>نام محصول</th>
                <th>قیمت</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price, 2) }} تومان</td>
                    <td>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-info">نمایش</a>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-warning">ویرایش</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">حذف</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
