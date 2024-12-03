<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت</title>
    <!-- اضافه کردن استایل ها -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons+Outlined" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <!-- هدر -->
    @include('layouts.admin.header')

    <!-- سایدبار -->
    @include('layouts.admin.sidebar')

    <!-- محتوای اصلی -->
    <div class="content">
        @yield('content')
    </div>

    <!-- اسکریپت‌ها -->
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
