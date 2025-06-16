@extends('website.layouts.app')
@section('title') Home @endsection
@section('meta')
    <meta name="title" content="Fastlinee - Chauffeur Hailing">
    <meta name="description" content="Book your Ride with Fastlinee. Chauffeur Hailing - City to City Rides - Airport Transfers - Hourly Hire - Madinah Hotel to Makkah Hotel">
    <meta name="keywords" content="Chauffeur Hailing, City to City Rides, Airport Transfers, Madinah Hotel to Makkah Hotel, Madinah Airport to Madinah Hotel, Madinah Hotel to Jeddah Airport, ">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
@endsection
@section('content')
    {{-- Banner Start --}}
    @include('website.includes.banner')
    {{-- Banner End --}}

    <section class="py-md-5 custom-margin">
        <div class="container">
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <h1 class="text-center fs-4">Best Taxi Service in Saudia Arabia – Fastlinee</h1>
                    <p class="sustain my-auto px-5 text-center">Experience the epitome of convenience with our effortless pickup and drop-off services.</p>
                    <p class="sustain my-auto px-5 pb-3 text-center">
                        At Fastlinee.com, we understand the essence of travel - be it for spiritual fulfillment during your Umrah pilgrimage, exploring the sacred sites through Ziyarah, or simply navigating through the bustling streets of Saudi Arabia. That's why we've dedicated ourselves to ensuring your journeys are not just travels, but experiences worth cherishing. From our top-notch transportation options to our unbeatable rates, we've got you covered every step of the way.
                    </p>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-4 d-flex justify-content-center">
                            <img class="mx-auto mb-5" src="{{ asset('web-assets/img/car-insurance.png') }}" alt="" width="100">
                        </div>
                        <div class="col-md-4 d-flex justify-content-center">
                            <img class="mb-5" src="{{ asset('web-assets/img/travel-insurance.png') }}" alt="" width="100">
                        </div>
                        <div class="col-md-4 d-flex justify-content-center">
                            <img class="mb-5" src="{{ asset('web-assets/img/driver.png') }}" alt="" width="100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Services Section Start --}}
    <section class="services-section">
        <div class="container">
            <h2 class="text-center pb-5">Your Ultimate Travel Companion in Saudi Arabia</h2>

            <div class="row">
                <div class="col-md-6 col-lg-3 service-item">
                    <img src="{{ asset('web-assets/img/chauffeur1.jpg') }}" alt="Service Image 1">
                    <h2 class="text-center">City To City Rides</h2>
                    <p class="text-center">
                        Looking for stress-free city-to-city travel? Our chauffeur service offers reliable, affordable rides with courteous drivers. Book online, enjoy flexibility, and experience convenient, safe, quality travel today.
                    </p>
                    <div class="d-flex justify-content-center"><a href="{{ url('city-to-city') }}" class="read-more">Read More</a></div>
                </div>

                <div class="col-md-6 col-lg-3 service-item">
                    <img src="{{ asset('web-assets/img/chauffeur2.jpg') }}" alt="Service Image 2">
                    <h2 class="text-center">Chauffeur Hailing</h2>
                    <p class="text-center">
                        Chauffeur hailing, a revolutionary urban mobility solution, combines ride-hailing convenience with chauffeur luxury. Choose from premium vehicles, enjoy fixed pricing, and experience stress-free, eco-friendly travel.
                    </p>
                    <div class="d-flex justify-content-center"><a href="{{ url('chauffeur-hailing') }}" class="read-more">Read More</a></div>
                </div>

                <div class="col-md-6 col-lg-3 service-item">
                    <img src="{{ asset('web-assets/img/chauffeur3.jpg') }}" alt="Service Image 3">
                    <h2 class="text-center">Airport Transfers</h2>
                    <p class="text-center">
                        Our Chauffeur drive service ensures hassle-free airport pickup and drop-off in 10+ cities, including Jeddah. Partnered with high-standard cars and knowledgeable drivers, extendable service within set distances.
                    </p>
                    <div class="d-flex justify-content-center"><a href="{{ url('airport-transfers') }}" class="read-more">Read More</a></div>
                </div>

                <div class="col-md-6 col-lg-3 service-item">
                    <img src="{{ asset('web-assets/img/chauffeur4.jpg') }}" alt="Service Image 4">
                    <h2 class="text-center">Hourly Hire</h2>
                    <p class="text-center">
                        Ever wished for a personal chauffeur to simplify your hectic schedule? Introducing the hourly hire chauffeur service, offering unparalleled control and flexibility. Book for specified hours, pay a flat rate.
                    </p>
                    <div class="d-flex justify-content-center"><a href="{{ url('hourly-hire') }}" class="read-more">Read More</a></div>
                </div>
            </div>
        </div>
    </section>
    {{-- Services Section End --}}

    {{-- Available Routes Section Start --}}
    <section class="mt-5 py-5 bg-grayish-blue">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center pb-5" id="routes">Our Routes</h2>
                </div>
                @foreach ($ourRoutes as $route)
                <div class="col-md-6 col-lg-3 routes" data-route-id="{{ $route->id }}">
                    <div class="card mb-3">
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title">{{ $route->location_from }} <i class="fas fa-arrow-right mx-3"></i> {{ $route->location_to }}</h6>
                            <p class="card-text">{{ ($route->location_to == '') ? 'Hourly Route' : 'One Way Route' }}</p>
                            {{-- <h6 class="card-footer text-center">From {{ number_format($route->service_price) }} SR</h6> --}}
                            <button type="button" class="btn web-btn mt-2 mx-auto book-ride-btn">Book Ride</button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- Available Routes Section End --}}

    <section class="mt-md-5 py-5">
        <div class="container">
            <h2 class="text-center pb-4">Why Choose Fastlinee.com?</h2>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="card mb-3">
                        <img class="mx-auto mt-3" src="{{ asset('web-assets/img/car-insurance2.png') }}" alt="Safety First" width="50">
                        <div class="card-body">
                            <h3 class="card-title text-center">Umrah Taxi Service</h3>
                            <p class="card-text text-center">Embark on your spiritual journey with peace of mind. Our specialized Umrah Taxi Service ensures that your focus remains on your faith. From Madina to Makkah, every ride is blessed with comfort and convenience.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card mb-3">
                        <img class="mx-auto mt-3" src="{{ asset('web-assets/img/calendar.png') }}" alt="Private travel solutions" width="50">
                        <div class="card-body">
                            <h4 class="card-title text-center">Jeddah/Makkah Taxi</h4>
                            <p class="card-text text-center">Discover Jeddah, the gateway to the heart of Islam, with our trusted taxi services. Whether it’s a flight to catch at Jeddah Airport or a serene drive to Makkah, Fastlinee.com guarantees a ride that’s both comfortable and punctual.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-lg-4">
                    <div class="card mb-3">
                        <img class="mx-auto mt-3" src="{{ asset('web-assets/img/limousine.png') }}" alt="Private travel solutions" width="50">
                        <div class="card-body">
                            <h4 class="card-title text-center">Makkah Ziyarat Taxi</h4>
                            <p class="card-text text-center">With Fastlinee.com, explore Saudi Arabia like never before. Our services extend to “Makkah Ziyarat Taxi” for those wishing to visit the holy sites. Experience the spiritual essence of Saudi with ease and affordability.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="my-md-5 pb-md-5 bg-grayish-white">
        <div class="container driver-section">
            <h2 class="text-center">Seamless Rides, Unmatched Comfort, and Exceptional Rates Await!</h2>
        </div>
        <img src="{{ asset('web-assets/img/uber-driver.jpg') }}" class="img-responsive w-100 vh-50" style="height: 400px;object-fit: cover" alt="Full-width image of a car">
    </section>

    <section class="sustain-section mb-md-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mt-4 mt-md-0">
                    <h2>Fastlinee.com – Your Trusted Partner for Cab Bookings in Saudi Arabia</h2>
                    <p>Our commitment to quality service and unbeatable rates has made us a favorite among Umrah Pilgrims, local commuters, and travel enthusiasts across Saudi Arabia.
                        <b>Begin your seamless travel experience with Fastlinee.com today!</b> Journey through the sacred landscapes of Saudi Arabia with us by your side.
                        Sign In to book your ride and enjoy a travel experience that combines the best of comfort, convenience, and affordability.
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('web-assets/img/chauffeur3.jpg') }}" alt="Image 1" class="img-fluid img-thumbnail">
                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')
    <script>
        $(document).ready(function() {
            // Set up CSRF token for AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Event listener for booking type change
            $('#booking_type').change(function() {
                updateRoutes();
            });

            function updateRoutes() {
                var bookingType = $('#booking_type').val();
                var routeSelect = $('#route_id');
                var routeLabel = $('label[for="route_id"]');

                // Clear existing options
                routeSelect.empty();

                // Change label text based on booking type
                if (bookingType == 1) {
                    routeLabel.text('Routes:');
                } else if (bookingType == 2) {
                    routeLabel.text('Pickup Locations:');
                }

                // Fetch routes via AJAX
                $.ajax({
                    url: '/get-routes',
                    method: 'POST',
                    data: { booking_type: bookingType },
                    success: function(response) {
                        var routes = response.routes;
                        $.each(routes, function(index, route) {
                            routeSelect.append('<option value="' + route.id + '">' + route.location_from + (bookingType == 2 ? '' : ' To ' + route.location_to) + '</option>');
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching routes:', error);
                    }
                });
            }

            $('.book-ride-btn').on('click', function(e) {
                e.preventDefault();

                // Scroll to the form
                $('html, body').animate({
                    scrollTop: 0
                }, 500);
            });
        });
    </script>
@endsection
