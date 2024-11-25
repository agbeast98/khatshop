@extends('admin.layout')

@section('content')
<h1>ایجاد برگه جدید</h1>

<form action="{{ route('admin.pages.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>عنوان</label>
        <input type="text" name="title" class="form-control" required>
    </div>
    <div class="form-group">
        <label>لینک (slug)</label>
        <input type="text" name="slug" class="form-control" required>
    </div>
    <div class="form-group">
        <label>محتوا</label>
        <textarea name="content" class="form-control" required></textarea>
    </div>
    <div class="form-group">
        <label>وضعیت</label>
        <select name="status" class="form-control">
            <option value="1">فعال</option>
            <option value="0">غیرفعال</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success">ایجاد</button>
</form>
@endsection
