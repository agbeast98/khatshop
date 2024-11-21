<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت</title>
    <!-- لینک به فایل CSS -->
    <link rel="stylesheet" href="{{ asset('resources/css/admin/sidebar.css') }}">
</head>
<body>
    <!-- شامل کردن سایدبار -->
    @include('admin.sidebar')
    <div class="content">
        @yield('content')
    </div>
</body>
</html>
