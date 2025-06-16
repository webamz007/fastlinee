@extends('website.layouts.app')
@section('title') Airport Transfers @endsection
@section('meta')
    <meta name="title" content="Airport Transfers - Book Ride to Airport with Fastlinee">
    <meta name="description" content="Effortless Airport Transfers with Chauffeur Drive Service - You can book our convenient Chauffeur-drive service in over 10 cities, including Jeddah.">
    <meta name="keywords" content="Chauffeur Hailing, City to City Rides, Airport Transfers, Madinah Hotel to Makkah Hotel, Madinah Airport to Madinah Hotel, Madinah Hotel to Jeddah Airport, ">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
@endsection
@section('content')
    @include('website.includes.banner')
    <section class="mb-5 custom-margin">
        <div class="container">
            <div class="col-md-12">
                <h1 class="text-center pb-5">Your Trusted Airport Transfer Service in Saudi Arabia</h1>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-3">
                        <img class="mx-auto mt-3" src="{{ asset('web-assets/img/car-insurance2.png') }}" alt="Safety First" width="50">
                        <div class="card-body">
                            <h4 class="card-title text-center">Safety First</h4>
                            <p class="card-text text-center">Embrace a journey where safety is paramount. Every travel experience is underlined by our steadfast commitment to ensuring your well-being throughout every mile.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <img class="mx-auto mt-3" src="{{ asset('web-assets/img/calendar.png') }}" alt="Private travel solutions" width="50">
                        <div class="card-body">
                            <h4 class="card-title text-center">Private travel solutions</h4>
                            <p class="card-text text-center">Explore the ease of online convenience with our streamlined services. From booking to payment, experience seamless online solutions tailored for your travel needs.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-3">
                        <img class="mx-auto mt-3" src="{{ asset('web-assets/img/limousine.png') }}" alt="Private travel solutions" width="50">
                        <div class="card-body">
                            <h4 class="card-title text-center">Sustainable travel</h4>
                            <p class="card-text text-center">Embark on eco-conscious journeys. Our commitment to sustainable travel seamlessly integrates environmental responsibility into every mile, offering best transportation choice.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <img src="{{ asset('web-assets/img/uber-driver.jpg') }}" class="img-responsive w-100 vh-50 mb-5" style="height: 400px;object-fit: cover" alt="Full-width image of a car">
    <section class="sustain-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-4 mb-md-5 order-md-1">
                    <img src="{{ asset('web-assets/img/chauffeur1.jpg') }}" alt="Image 1" class="img-fluid img-thumbnail">
                </div>

                <div class="col-md-6 mb-4 mb-md-5 order-md-2">
                    <h2>Book Taxi for Airports</h2>
                    <p>
                        Welcome to Fastlinee, where your comfort and convenience are our top priorities. Whether you're an Umrah pilgrim seeking blessings or a travel enthusiast exploring the beauty of Saudi Arabia, our tailored airport transfer services ensure your journeys begin and end perfectly.
                    </p>
                </div>
                <div class="col-md-6 mb-4 mb-md-5 order-4 order-md-3">
                    <h2>Hassle-Free Airport Transfers</h2>
                    <p>
                        Bid farewell to the stress of navigating public transport or waiting for taxis. With Fastlinee, your airport pickup and drop-off in Saudi Arabia is just a booking away. Get ready to be whisked away in comfort the moment you land or leave your accommodation.
                    </p>
                </div>
                <div class="col-md-6 mb-4 mb-md-5 order-3 order-md-4">
                    <img src="{{ asset('web-assets/img/chauffeur2.jpg') }}" alt="Image 1" class="img-fluid img-thumbnail">
                </div>
            </div>
        </div>
    </section>
    <section class="sustain-section mb-md-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-4 mb-md-5 order-md-2">
                    <h2 class="text-center">Why Choose Fastlinee?</h2>
                    <h3>Service Across Major Cities</h3>
                    <p>We cover you in over 10 vibrant cities including the gateway to Umrah, Jeddah. Our extensive network ensures that no matter where you are in Saudi Arabia, your airport transfer is guaranteed to be smooth and efficient.</p>
                    <h3>High Standard Cars & Knowledgeable Chauffeurs</h3>
                    <p>Our partnership with local providers guarantees high standard vehicles for your transportation needs. Coupled with knowledgeable and professional drivers, expect not just a ride but a pleasant experience exploring the sights and sounds of the city en route.</p>
                    <h3>Flexible & Convenient</h3>
                    <p>Understanding the varied needs of our clients, we offer a set distance service with the flexibility of extending it at a minimal extra fee. Using our intuitive map, discover the areas covered by our Chauffeur drive service and plan your trips with ease.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
