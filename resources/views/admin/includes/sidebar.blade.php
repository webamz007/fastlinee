<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}"> <img alt="image" src="{{ asset('assets/img/logo.png') }}"
                    class="header-logo" /> <span class="logo-name">FastLinee</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown active">
                <a href="{{ route('dashboard') }}" class="nav-link"><i
                        class="fas fa-desktop"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i class="fas fa-users"></i><span>All Users</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('users.index') }}">Users</a></li>
                    <li><a class="nav-link" href="{{ route('users.index', 'agency') }}">Agencies</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i class="fas fa-route"></i><span>Services</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('services.index') }}">Manage Services</a></li>
                    <li><a class="nav-link" href="{{ route('routes.index') }}">Manage Routes</a></li>
                    <li><a class="nav-link" href="{{ route('cars.index') }}">Manage Cars</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown">
                    <i class="fas fa-globe-asia"></i><span>Bookings</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="{{ route('bookings', 'upcoming') }}">Upcoming Bookings</a></li>
                    <li><a class="nav-link" href="{{ route('bookings', 'active') }}">Active Bookings</a></li>
                    <li><a class="nav-link" href="{{ route('bookings', 'past') }}">Past Bookings</a></li>
                </ul>
            </li>
            <li><a class="nav-link" href="{{ route('password.create') }}"><i class="fas fa-lock"></i><span>Changed Password</span></a></li>
            {{-- <li><a class="nav-link" href="#"><i class="fas fa-clipboard-list"></i><span>Bookings</span></a></li> --}}
        </ul>
    </aside>
</div>
