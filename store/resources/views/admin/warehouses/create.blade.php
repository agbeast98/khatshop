@extends('admin.layout')

@section('content')
<h1>ایجاد انبار جدید</h1>

<form action="{{ route('admin.warehouses.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>نام انبار</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="form-group">
        <label>موقعیت</label>
        <input type="text" name="location" class="form-control">
    </div>
    <div class="form-group">
        <label>توضیحات</label>
        <textarea name="description" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-success">ایجاد</button>
</form>
@endsection
