@extends('admin.layout')

@section('title', 'پروفایل')

@section('content')

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">پروفایل کاربر</h1>

    <!-- نمایش اطلاعات پروفایل کاربر -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">اطلاعات پروفایل</h6>
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="name">نام کامل</label>
                    <input type="text" class="form-control" id="name" value="{{ $user->name }}" disabled>
                </div>
                <div class="form-group">
                    <label for="email">ایمیل</label>
                    <input type="email" class="form-control" id="email" value="{{ $user->email }}" disabled>
                </div>
                <div class="form-group">
                    <label for="avatar">آواتار</label><br>
                    <img src="{{ asset('images/admin/' . $user->avatar) }}" alt="Avatar" class="img-fluid rounded-circle" width="150">
                </div>
                <!-- بخش تغییر رمز عبور (اختیاری) -->
                <div class="form-group">
                    <a href="{{ route('password.change') }}" class="btn btn-primary">تغییر رمز عبور</a>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
