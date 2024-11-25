<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'فروشگاه')</title>
    <!-- افزودن لینک‌های CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth/register.css') }}">
    <link rel="stylesheet" href="{{ asset('css/auth/login.css') }}">
</head>
<body>
    <!-- هدر -->
    @include('partials.header')

    <!-- محتوای اصلی -->
    <main>
        @yield('content')
    </main>

    <!-- فوتر -->
    @include('partials.footer')

    <!-- افزودن اسکریپت‌های جاوااسکریپت -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
