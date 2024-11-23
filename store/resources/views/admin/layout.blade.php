<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل مدیریت</title>
    <link rel="stylesheet" href="{{ asset('css/admin/sidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/dashboard.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="{{ asset('css/admin/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/fields.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/tables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin/buttons.css') }}">


</head>
<body>
    <!-- دکمه نمایش سایدبار -->
    <button class="toggle-btn" onclick="toggleSidebar()">☰</button>

    <!-- سایدبار -->
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
