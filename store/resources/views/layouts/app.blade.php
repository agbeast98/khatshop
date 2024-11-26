<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فروشگاه</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <!-- هدر سایت -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">فروشگاه</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">خانه</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">محصولات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">درباره ما</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="text-center">
        <p>تمامی حقوق محفوظ است.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
