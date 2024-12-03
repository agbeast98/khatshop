<aside class="sidebar-wrapper">
    <div class="sidebar-header">
        <div class="logo-icon">
            <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-img" alt="">
        </div>
        <div class="logo-name flex-grow-1">
            <h5 class="mb-0">پنل مدیریت</h5>
        </div>
        <div class="sidebar-close">
            <span class="material-icons-outlined">close</span>
        </div>
    </div>

    <div class="sidebar-nav">
        <ul class="metismenu" id="sidenav">
            <li>
                <a href="{{ route('admin.dashboard') }}" class="has-arrow">
                    <div class="parent-icon"><i class="material-icons-outlined">home</i></div>
                    <div class="menu-title">داشبورد</div>
                </a>
            </li>

        </ul>
    </div>
</aside>
