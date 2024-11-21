@extends('admin.layout')

@section('content')
    <h1>تنظیمات</h1>
    <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <h3>تنظیمات کلی</h3>
        <div class="form-group">
            <label for="site_name">نام سایت</label>
            <input type="text" name="site_name" class="form-control" value="{{ $settings['site_name'] }}">
        </div>
        <div class="form-group">
            <label for="favicon">فایکون سایت</label>
            <input type="file" name="favicon" class="form-control">
        </div>
        <div class="form-group">
            <label for="logo">لوگو سایت</label>
            <input type="file" name="logo" class="form-control">
        </div>
        <div class="form-group">
            <label for="trust_script">اسکریپت نماد اعتماد</label>
            <textarea name="trust_script" class="form-control">{{ $settings['trust_script'] }}</textarea>
        </div>
        <div class="form-group">
            <label for="organization_script">اسکریپت ساماندهی</label>
            <textarea name="organization_script" class="form-control">{{ $settings['organization_script'] }}</textarea>
        </div>
        <div class="form-group">
            <label for="admin_email">ایمیل مدیر</label>
            <input type="email" name="admin_email" class="form-control" value="{{ $settings['admin_email'] }}">
        </div>
        <div class="form-group">
            <label for="store_state">استان فروشگاه</label>
            <input type="text" name="store_state" class="form-control" value="{{ $settings['store_state'] }}">
        </div>
        <div class="form-group">
            <label for="store_city">شهر فروشگاه</label>
            <input type="text" name="store_city" class="form-control" value="{{ $settings['store_city'] }}">
        </div>

        <h3>تنظیمات درگاه پرداخت</h3>
        <div class="form-group">
            <label for="payment_gateway">درگاه پرداخت</label>
            <input type="text" name="payment_gateway" class="form-control" value="{{ $settings['payment_gateway'] }}">
        </div>
        <div class="form-group">
            <label for="payment_key">کد درگاه</label>
            <input type="text" name="payment_key" class="form-control" value="{{ $settings['payment_key'] }}">
        </div>

        <h3>تنظیمات پیامکی</h3>
        <div class="form-group">
            <label for="sms_phone">شماره موبایل مدیر</label>
            <input type="text" name="sms_phone" class="form-control" value="{{ $settings['sms_phone'] }}">
        </div>
        <div class="form-group">
            <label for="sms_username">نام کاربری پنل پیامکی</label>
            <input type="text" name="sms_username" class="form-control" value="{{ $settings['sms_username'] }}">
        </div>
        <div class="form-group">
            <label for="sms_password">رمز عبور پنل پیامکی</label>
            <input type="password" name="sms_password" class="form-control" value="{{ $settings['sms_password'] }}">
        </div>
        <div class="form-group">
            <label for="sms_sender">شماره ارسال کننده</label>
            <input type="text" name="sms_sender" class="form-control" value="{{ $settings['sms_sender'] }}">
        </div>

        <button type="submit" class="btn btn-primary">ذخیره</button>
    </form>
@endsection
