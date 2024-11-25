@extends('admin.layout')

@section('content')
<h1>مدیریت انبارها</h1>

<a href="{{ route('admin.warehouses.create') }}" class="btn btn-primary">ایجاد انبار جدید</a>

<table class="table">
    <thead>
        <tr>
            <th>نام انبار</th>
            <th>موقعیت</th>
            <th>توضیحات</th>
            <th>عملیات</th>
        </tr>
    </thead>
    <tbody>
        @foreach($warehouses as $warehouse)
        <tr>
            <td>{{ $warehouse->name }}</td>
            <td>{{ $warehouse->location }}</td>
            <td>{{ $warehouse->description }}</td>
            <td>
                <a href="{{ route('admin.warehouses.edit', $warehouse->id) }}" class="btn btn-warning">ویرایش</a>
                <form action="{{ route('admin.warehouses.destroy', $warehouse->id) }}" method="POST" style="display:inline-block;">
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
