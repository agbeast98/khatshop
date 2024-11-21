<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت</title>
    <link rel="stylesheet" href="{{ asset('css/admin/sidebar.css') }}">
</head>
<body>
    <!-- دکمه باز و بسته کردن سایدبار -->
    <button class="toggle-btn" onclick="toggleSidebar()">☰</button>

    <!-- شامل کردن سایدبار -->
    @include('admin.sidebar')

    <!-- محتوای اصلی -->
    <div class="content">
        @yield('content')
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('active');
        }
    </script>
</body>
</html>
