<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'پنل مدیریت')</title>

<!-- favicon -->
<link rel="icon" href="{{ asset('images/admin/favicon-32x32.png') }}" type="image/png">

<!-- Loader -->
<link href="{{ asset('css/admin/pace.min.css') }}" rel="stylesheet">

<!-- Plugins -->
<link href="{{ asset('css/admin/perfect-scrollbar.css') }}" rel="stylesheet">
<link href="{{ asset('css/admin/metisMenu.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/admin/mm-vertical.css') }}" rel="stylesheet">
<link href="{{ asset('css/admin/simplebar.css') }}" rel="stylesheet">

<!-- Bootstrap CSS -->
<link href="{{ asset('css/admin/bootstrap.min.css') }}" rel="stylesheet">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?fa" rel="stylesheet">

@stack('styles')

</head>

<body>

    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('admin') }}">
                <div class="sidebar-brand-text mx-3">پنل مدیریت</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="{{ url('admin') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>داشبورد</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.products.index') }}">
                    <i class="fas fa-fw fa-cogs"></i>
                    <span>محصولات</span>
                </a>
            </li>

            <hr class="sidebar-divider">



        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">نام کاربر</span>
                                <img class="img-profile rounded-circle" src="{{ asset('assets/images/admin/default-avatar.png') }}">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ route('profile') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    پروفایل
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    خروج
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>

                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/admin/pace.min.js') }}"></script>
    <script src="{{ asset('js/admin/metisMenu.min.js') }}"></script>
    <script src="{{ asset('js/admin/bootstrap.bundle.min.js') }}"></script>

    @stack('scripts')
</body>

</html>
