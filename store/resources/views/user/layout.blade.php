
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سایت فروشگاهی</title>
    <link rel="stylesheet" href="{{ asset('css/user/main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user/header.css') }}">

</head>
<body>
    <header class="header">
        <div class="container">
            <div class="header-content">
                <a href="/" class="logo">لوگوی سایت</a>
                <nav class="menu">
                    <ul>
                        <li><a href="/">خانه</a></li>
                        <li><a href="/products">محصولات</a></li>
                        <li><a href="/about">درباره ما</a></li>
                        <li><a href="/contact">تماس با ما</a></li>
                    </ul>
                </nav>
                <div class="auth-buttons">
                    @guest
                        <a href="/login" class="button">ورود</a>
                        <a href="/register" class="button button-primary">ثبت‌نام</a>
                    @else
                        <a href="/user/dashboard" class="button">داشبورد</a>
                        <form action="/logout" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="button button-danger">خروج</button>
                        </form>
                    @endguest
                </div>
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <footer class="footer">
        <div class="container">
            <p>© {{ date('Y') }} تمامی حقوق محفوظ است.</p>
        </div>
    </footer>
</body>
</html>
