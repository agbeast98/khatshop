@extends('layouts.app')

@section('content')
<div class="register-container">
    <h1>ثبت‌نام کاربر</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('register.post') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="first_name">نام:</label>
            <input type="text" id="first_name" name="first_name" class="form-control" required value="{{ old('first_name') }}">
        </div>

        <div class="form-group">
            <label for="last_name">نام خانوادگی:</label>
            <input type="text" id="last_name" name="last_name" class="form-control" required value="{{ old('last_name') }}">
        </div>

        <div class="form-group">
            <label for="email">ایمیل:</label>
            <input type="email" id="email" name="email" class="form-control" required value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label for="phone">شماره موبایل:</label>
            <input type="text" id="phone" name="phone" class="form-control" required value="{{ old('phone') }}" placeholder="09123456789">
        </div>

        <div class="form-group">
            <label for="password">رمز عبور:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">تایید رمز عبور:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">ثبت‌نام</button>
    </form>
</div>
@endsection
