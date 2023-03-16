<nav class="sb-sidenav accordion sb-sidenav-light-1" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Core</div>
            <a class="nav-link {{ request()->routeIs('secure.home') ? 'active' : '' }}" href="{{ route('secure.home') }}">
                <div class="sb-nav-link-icon"><i class="bi bi-speedometer"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Interface</div>
            <a class="nav-link {{ request()->routeIs('secure.users.*') ? 'active' : 'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#layoutsNav" aria-expanded="false" aria-controls="layoutsNav">
                <div class="sb-nav-link-icon"><i class="bi bi-list"></i></div>
                User Management
                <div class="sb-sidenav-collapse-arrow"><i class="bi bi-caret-down-fill"></i></div>
            </a>
            <div class="collapse {{ request()->routeIs('secure.users.*') ? 'show' : '' }}" id="layoutsNav" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link {{ request()->routeIs('secure.users.user-list') ? 'active' : '' }}" href="{{ route('secure.users.user-list') }}"><i class="bi bi-arrow-right-short"></i>User List</a>
                    <a class="nav-link {{ request()->routeIs('secure.users.blank-page') ? 'active' : '' }}" href="{{ route('secure.users.blank-page') }}"><i class="bi bi-arrow-right-short"></i>Blank Page</a>
                </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesNav" aria-expanded="false" aria-controls="pagesNav">
                <div class="sb-nav-link-icon"><i class="bi bi-list"></i></div>
                Pages
                <div class="sb-sidenav-collapse-arrow"><i class="bi bi-caret-down-fill"></i></div>
            </a>
            <div class="collapse" id="pagesNav" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link" href=""><i class="bi bi-arrow-right-short"></i>Authentication</a>
                    <a class="nav-link" href=""><i class="bi bi-arrow-right-short"></i>Error</a>
                </nav>
            </div>
            <div class="sb-sidenav-menu-heading">Addons</div>
            <a class="nav-link" href="">
                <div class="sb-nav-link-icon"><i class="bi bi-list-check"></i></div>
                Reports
            </a>
        </div>
    </div>
</nav>