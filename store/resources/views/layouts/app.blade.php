<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'خانه')</title>
    
    <!-- لینک به استایل‌های مشترک سایت -->
    <link rel="stylesheet" href="{{ asset('css/user/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/style.css') }}">

    <!-- اضافه کردن فونت‌ها و استایل‌های خارجی در صورت نیاز -->
    <link href="https://fonts.googleapis.com/css2?family=Vazir:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Vazir', sans-serif;
        }
    </style>

    @stack('styles') <!-- به این صورت استایل‌های اضافی برای صفحات خاص را می‌توان اضافه کرد -->
</head>
<body>
    <div class="container">
        <!-- هدر سایت -->
        @include('partials.header')

        <!-- نمایش پیام‌ها و خطاها -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- محتوای صفحه مورد نظر -->
        @yield('content')

        <!-- فوتر سایت -->
        @include('partials.footer')
    </div>

    <!-- اسکریپت‌های جاوااسکریپت (اختیاری) -->
    <script src="{{ asset('js/app.js') }}"></script>

    @stack('scripts') <!-- اسکریپت‌های اضافی برای صفحات خاص -->
</body>
</html>
