@extends('website.layouts.app')
@section('title') City To City Rides @endsection
@section('meta')
    <meta name="title" content="City-to-City Travel with Our Chauffeur Service - Fastlinee">
    <meta name="description" content="We offer comfortable, reliable, and affordable rides from door to door, with professional and courteous chauffeurs who know the best routes and can handle any traffic situation. ">
    <meta name="keywords" content="Chauffeur Hailing, City to City Rides, Airport Transfers, Madinah Hotel to Makkah Hotel, Madinah Airport to Madinah Hotel, Madinah Hotel to Jeddah Airport, ">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
@endsection
@section('content')
    @include('website.includes.banner')
    <section class="sustain-section mb-md-5 pb-mb-5 custom-margin">
        <div class="container">
            <h1 class="text-center py-4">Your Gateway to Seamless City-to-City Travel in Saudi Arabia</h1>
            <div class="row">
                <div class="col-md-6 mt-4 mt-md-0">
                    <h2>Book City to City Taxi</h2>
                    <p>
                        Welcome to Fastlinee, where every mile is a promise of comfort, convenience, and unparalleled service. We specialize in providing premium city-to-city rides across the vibrant landscapes of Saudi Arabia, ensuring your travel between its holy cities and bustling metropolises is nothing short of exceptional. Whether you're a devout Umrah pilgrim seeking serene travel from Makkah to Madina, or a travel enthusiast exploring the rich tapestry of Saudi Arabia's cities, Fastlinee is your trusted companion on the road.
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('web-assets/img/chauffeur3.jpg') }}" alt="Image 1" class="img-fluid img-thumbnail">
                </div>
            </div>
        </div>
    </section>
   <section class="sustain-section mb-md-5 pb-mb-5 custom-margin">
    <div class="container">
        <h2 class="text-center py-4">Experience the Difference with Fastlinee</h2>
        <h3>Tailored City-to-City Chauffeur Service</h3>
        <p>At Fastlinee, we understand that the essence of travel is not just reaching your destination but enjoying the journey itself. Our city-to-city chauffeur service is thoughtfully designed to cater to your unique travel needs, offering a seamless, comfortable, and personal travel experience.</p>
        <h2>Why Choose Fastlinee?</h2>
        <ul>
            <li>Direct Transportation: From Makkah to Madina, Jeddah to Makkah, or any city pair across Saudi Arabia, our direct routes ensure you reach your destination efficiently and comfortably.</li>
            <li>Professional Chauffeurs: Our experienced drivers are not only experts on the road but also understand the importance of hospitality, ensuring your travel is pleasant and respectful.</li>
            <li>Convenience at Its Best: Easy booking, flexible schedules, and door-to-door service mean your travel plans are in competent hands from start to finish.</li>
            <li>Competitively Priced: Enjoy premium travel experiences at competitive prices. With Fastlinee, luxury meets affordability.</li>
        </ul>
        <h2>Our Services</h2>
        <ul>
            <li>Makkah to Madina Cab: Begin or complete your spiritual journey in the comfort and serenity our service provides.</li>
            <li>Rent Car Madina to Makkah: Our rental solutions offer flexibility and reliability for your sacred travels.</li>
            <li>Book Car Jeddah to Makkah & Vice Versa: Effortlessly transition between the spiritual serenity of Makkah and the bustling energy of Jeddah</li>
            <li>Book Car Makkah to Jeddah Airport: Ensure your departure is as smooth and stress-free as your stay with our reliable airport transfer services.</li>
        </ul>
        <h2>Join the Fastlinee Family</h2>
        <p>
            Are you ready to redefine your city-to-city travel experience in Saudi Arabia? Book Your Fastlinee Ride Now and discover the ultimate travel convenience tailored just for you. Whether it’s the spiritual call of Umrah or the allure of exploring Saudi Arabia’s historic and modern marvels, your perfect travel companion awaits.
            Join us on this remarkable journey. Secure your ride with Fastlinee today and unlock a world of seamless, stress-free travel tailored perfectly to your needs. Welcome aboard, where your next adventure begins with comfort and style.
        </p>
    </div>
    </section>
    {{-- Available Routes Section Start --}}
    <section class="mt-5 py-5 bg-grayish-blue">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center pb-5" id="routes">City To City Routes</h2>
                </div>
                @foreach ($ourRoutes as $route)
                <div class="col-md-3 routes" data-route-id="{{ $route->id }}">
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
