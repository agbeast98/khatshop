@extends('admin.layout')

@section('content')
    <h1>ایجاد دسته‌بندی جدید</h1>
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">نام دسته‌بندی</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="slug">اسلاگ</label>
            <input type="text" name="slug" class="form-control">
        </div>
        <div class="form-group">
            <label for="image">تصویر</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-group">
            <label for="parent_id">دسته‌بندی والد</label>
            <select name="parent_id" class="form-control">
                <option value="">بدون والد</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">ذخیره</button>
    </form>
@endsection
