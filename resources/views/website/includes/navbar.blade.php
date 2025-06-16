<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <a class="navbar-brand font-bold" href="{{ url('/') }}">
            <img src="{{ asset('web-assets/img/header-logo.png') }}" alt="Fastlinee Logo" width="90">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item font-bold pe-3">
                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item dropdown pe-3">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Our
                        Services</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('city-to-city') }}">City to City Rides</a></li>
                        <li><a class="dropdown-item" href="{{ route('chauffeur-hailing') }}">Chauffeur Hailing</a></li>
                        <li><a class="dropdown-item" href="{{ route('airport-transfers') }}">Airport Transfers</a></li>
                        <li><a class="dropdown-item" href="{{ route('hourly-hire') }}">Hourly Hire</a></li>
                    </ul>
                </li>
                <li class="nav-item pe-3">
                    <a class="nav-link" href="{{ route('about-us') }}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact-us') }}">Contact Us</a>
                </li>
                <li class="nav-item dropdown d-block d-md-none">
                    @if (Auth::guest())
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Book
                            Ride</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('login') }}">Login</a></li>
                            <li><a class="dropdown-item" href="{{ url('register') }}">Register</a></li>
                        </ul>
                    @else
                        <a class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown">{{ auth()->user()->name }}</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ url('profile') }}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('user-bookings') }}">Bookings</a></li>
                        </ul>
                    @endif
                </li>
            </ul>
        </div>
        @if (Auth::guest())
            <div class="dropdown d-none d-lg-block">
                <button class="btn web-btn dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Book Ride</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ url('login') }}">Login</a>
                    <a class="dropdown-item" href="{{ url('register') }}">Register</a>
                </div>
            </div>
        @else
            <div class="dropdown d-none d-lg-block">
                <button class="btn web-btn dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">{{ auth()->user()->name }}</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ url('profile') }}">Profile</a>
                    <a class="dropdown-item" href="{{ route('user-bookings') }}">Bookings</a>
                    <form method="POST" action="{{ route('logout') }}"
                        onclick="event.preventDefault();this.closest('form').submit();">
                        @csrf
                        <a class="dropdown-item divider" href="{{ route('logout') }}">Logout</a>
                    </form>
                </div>
            </div>
        @endif
    </div>
</nav>
