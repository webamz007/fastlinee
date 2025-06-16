<footer class="bg-black text-white p-4">
    <div class="container">
        <div class="row">
            <div class="col-md-3 text-center">
                <img src="{{ asset('web-assets/img/footer-logo.png') }}" alt="FastLinee Logo" class="logo"
                    width="170">
            </div>

            <div class="col-md-3 col-6 text-center">
                <h5>Servcies</h5>
                <ul class="import-pages mt-3 list-unstyled">
                    <li><a class="text-white text-decoration-none" href="{{ route('city-to-city') }}">City to City
                            Rides</a></li>
                    <li><a class="text-white text-decoration-none" href="{{ route('chauffeur-hailing') }}">Chauffeur
                            Hailing</a></li>
                    <li><a class="text-white text-decoration-none" href="{{ route('airport-transfers') }}">Airport
                            Transfers</a></li>
                    <li><a class="text-white text-decoration-none" href="{{ route('hourly-hire') }}">Hourly Hire</a>
                    </li>
                </ul>
            </div>

            <div class="col-md-3 col-6 text-center">
                <h5>Pages</h5>
                <ul class="import-pages mt-3 list-unstyled">
                    <li><a class="text-white text-decoration-none" href="{{ route('terms-conditions') }}">Terms &
                            Conditions</a></li>
                    <li><a class="text-white text-decoration-none" href="{{ route('about-us') }}">About Us</a></li>
                    <li><a class="text-white text-decoration-none" href="{{ route('contact-us') }}">Contact Us</a></li>
                </ul>
            </div>

            <div class="col-md-3 col-12 text-center">
                <h5>Follow Us</h5>
                <ul class="social-links mt-3 list-unstyled">
                    <li class="d-inline-block mx-2"><a href="#" target="_blank"><i
                                class="fab fa-facebook fa-2x text-white"></i></a></li>
                    <li class="d-inline-block mx-2"><a href="#" target="_blank"><i
                                class="fab fa-twitter fa-2x text-white"></i></a></li>
                    <li class="mt-2"><a href="tel:+447481691058" class="text-decoration-none text-white"><i
                                class="fa-solid fa-phone text-white me-2"></i>+44 748 1691 058</a></li>
                    <li class="mt-2"><a href="tel:+966583768028" class="text-decoration-none text-white"><i
                                class="fa-solid fa-phone text-white me-2"></i>+966 58 376 8028</a></li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <hr class="footer-divider">
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 align-self-center">
                <p class="text-center my-auto">Copyright &copy; 2023 FastLinee. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
