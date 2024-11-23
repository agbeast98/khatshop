@extends('admin.layout')

@section('content')
    <h1>تنظیمات سایت</h1>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="site_name">نام سایت</label>
            <input type="text" name="site_name" class="field" value="{{ $settings['site_name'] ?? '' }}">
        </div>
        <div class="form-group">
            <label for="favicon">فایکون سایت</label>
            <input type="file" name="favicon" class="field">
        </div>
        <div class="form-group">
            <label for="logo">لوگو سایت</label>
            <input type="file" name="logo" class="field">
        </div>
        <div class="form-group">
            <label for="trust_script">اسکریپت نماد اعتماد</label>
            <textarea name="trust_script" class="field">{{ $settings['trust_script'] ?? '' }}</textarea>
        </div>
        <div class="form-group">
            <label for="manager_email">ایمیل مدیر</label>
            <input type="email" name="manager_email" class="field" value="{{ $settings['manager_email'] ?? '' }}">
        </div>
        <div class="form-group">
            <label for="state">استان فروشگاه</label>
            <input type="text" name="state" class="field" value="{{ $settings['state'] ?? '' }}">
        </div>
        <div class="form-group">
            <label for="city">شهر فروشگاه</label>
            <input type="text" name="city" class="field" value="{{ $settings['city'] ?? '' }}">
        </div>
        <div class="form-group">
            <label for="payment_gateway">درگاه پرداخت</label>
            <input type="text" name="payment_gateway" class="field" value="{{ $settings['payment_gateway'] ?? '' }}">
        </div>
        <div class="form-group">
            <label for="gateway_key">کلید درگاه</label>
            <input type="text" name="gateway_key" class="field" value="{{ $settings['gateway_key'] ?? '' }}">
        </div>
        <div class="form-group">
            <label for="sms_phone">شماره موبایل پیامک</label>
            <input type="text" name="sms_phone" class="field" value="{{ $settings['sms_phone'] ?? '' }}">
        </div>
        <div class="form-group">
            <label for="sms_username">نام کاربری پنل پیامک</label>
            <input type="text" name="sms_username" class="field" value="{{ $settings['sms_username'] ?? '' }}">
        </div>
        <div class="form-group">
            <label for="sms_password">رمز عبور پنل پیامک</label>
            <input type="text" name="sms_password" class="field" value="{{ $settings['sms_password'] ?? '' }}">
        </div>
        <div class="form-group">
            <label for="sms_sender">شماره ارسال‌کننده</label>
            <input type="text" name="sms_sender" class="field" value="{{ $settings['sms_sender'] ?? '' }}">
        </div>
        <button type="submit" class="button">ذخیره تنظیمات</button>
    </form>
@endsection
