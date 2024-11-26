<header class="header">
    <div class="header__logo">
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
        </a>
    </div>
    <nav class="header__nav">
        <ul class="header__menu">
            <li><a href="{{ route('home') }}">خانه</a></li>
            <li><a href="{{ route('products.index') }}">محصولات</a></li>
            <li><a href="{{ route('contact.index') }}">تماس با ما</a></li>
            <li><a href="{{ route('about.index') }}">درباره ما</a></li>
        </ul>
    </nav>
    <div class="header__auth">
        @auth
            <a href="{{ route('logout') }}" class="auth__button">خروج</a>
        @else
            <a href="{{ route('login') }}" class="auth__button">ورود</a>
            <a href="{{ route('register') }}" class="auth__button">ثبت‌نام</a>
        @endauth
    </div>
</header>


<!-- بارگذاری استایل -->
<link rel="stylesheet" href="{{ asset('css/user/header.css') }}">
