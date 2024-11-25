@extends('layouts.app')

@section('content')
<div class="login-container">
    <h1>ورود به حساب کاربری</h1>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">ایمیل:</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password">رمز عبور:</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">ورود</button>
    </form>

    <p>حساب کاربری ندارید؟ <a href="{{ route('register') }}">ثبت‌نام</a></p>
</div>
@endsection
