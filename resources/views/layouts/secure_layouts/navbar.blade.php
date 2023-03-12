<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand d-flex align-items-center" href="{{ route('secure.home') }}">
        <div class="ps-3">
            <img src="{{ asset('assets/images/android-chrome-512x512.png') }}" class="logo-brand">
        </div>
        <div class="sidebar-brand-text ms-2">SB-Admin-Laravel</div>
    </a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="bi bi-list-nested fs-4"></i></button>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }} <i class="bi bi-person fs-4"></i></a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route('home') }}">{{ __('Public Page') }}</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="{{ route ('logout') }}">Logout</a></li>
            </ul>
        </li>
    </ul>
</nav>