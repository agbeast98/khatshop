<header>
    <nav>
        <ul>
            <li><a href="{{ route('home') }}">خانه</a></li>
            <li><a href="{{ route('products.index') }}">محصولات</a></li>
            <li><a href="{{ route('contact.index') }}">تماس با ما</a></li>
            <li><a href="{{ route('about.index') }}">درباره ما</a></li>
            @auth
                <li><a href="{{ route('logout') }}">خروج</a></li>
            @else
                <li><a href="{{ route('login') }}">ورود</a></li>
                <li><a href="{{ route('register') }}">ثبت‌نام</a></li>
            @endauth
        </ul>
    </nav>
</header>
