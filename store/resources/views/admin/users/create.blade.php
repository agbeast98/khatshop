@extends('admin.layout')

@section('content')
    <h1>افزودن کاربر جدید</h1>
    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="first_name">نام</label>
            <input type="text" name="first_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="last_name">نام خانوادگی</label>
            <input type="text" name="last_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="email">ایمیل</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="phone">شماره موبایل</label>
            <input type="text" name="phone" class="form-control">
        </div>
        <div class="form-group">
            <label for="role">نقش</label>
            <select name="role" class="form-control" required>
                <option value="customer">مشتری</option>
                <option value="admin">مدیر</option>
                <option value="employee">کارمند</option>
            </select>
        </div>
        <div class="form-group">
            <label for="avatar">تصویر یا آواتار</label>
            <input type="file" name="avatar" class="form-control">
        </div>
        <div class="form-group">
            <label for="password">رمز عبور</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">ذخیره</button>
    </form>
@endsection
