@extends('admin.layout')

@section('title', 'مدیریت محصولات')

@section('content')

<!-- صفحه نمایش محصولات -->
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">مدیریت محصولات</h1>

    <!-- جدول محصولات -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">لیست محصولات</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام محصول</th>
                            <th>قیمت</th>
                            <th>موجودی</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ number_format($product->price) }} تومان</td>
                            <td>{{ $product->stock }}</td>
                            <td>
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-warning btn-sm">ویرایش</a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
    <!-- لینک به فایل CSS ادمین -->
    <link href="{{ asset('css/admin/styles.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <!-- لینک به فایل JS ادمین -->
    <script src="{{ asset('js/admin/scripts.js') }}"></script>
@endpush
