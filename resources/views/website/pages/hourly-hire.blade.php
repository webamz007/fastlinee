@extends('website.layouts.app')
@section('title') Hourly Hire @endsection
@section('meta')
    <meta name="title" content="Hourly Hire Service - Book your Ride Now - Fastlinee">
    <meta name="description" content="Experience Hassle-Free Travel with Hourly Hire Chauffeur Service - This innovative service allows you to rent a car along with a dedicated driver for a specified number of hours.">
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
                <h1 class="text-center pb-5">Book Taxi Hourly</h1>
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
    <section class="sustain-section mb-md-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mb-5">
                    <img src="{{ asset('web-assets/img/chauffeur1.jpg') }}" alt="Image 1" class="img-fluid img-thumbnail">
                </div>

                <div class="col-md-6 mb-4 mb-md-5">
                    <h2>
                        Your Journey, Your Schedule
                    </h2>
                    <p>
                        Are you a pilgrim on your spiritual journey, or a traveler eager to explore the beauty of Saudi Arabia at your own pace? Look no further—Fastlinee introduces an unparalleled hourly taxi service to cater to your unique travel needs. Why rush through your day or worry about finding multiple rides when you can have a car and chauffeur at your disposal?
                    </p>
                </div>
                <div class="col-md-6">
                    <h2>Why Choose Fastlinee's Hourly Taxi Service?</h2>
                    <p>
                        <ul>
                            <li class="pb-3"><strong>Absolute Flexibility:</strong> Say goodbye to constantly booking rides. Our hourly service lets you plan your day with the peace of mind that your ride is waiting just for you.</li>
                            <li class="pb-3"><strong>Control Over Your Travel Plans:</strong> Whether it's a serene visit to religious sites or a spontaneous adventure across the cities of Saudi Arabia, control where you go and when.</li>
                            <li class="pb-3"><strong>Comfort and Safety:</strong> Our vehicles are maintained to the highest standards of hygiene and safety, ensuring a comfortable ride from start to finish.</li>
                            <li class="pb-3"><strong>Affordable and Straight forward Pricing:</strong> With clear, hourly rates, managing your travel budget has never been easier.</li>
                        </ul>
                    </p>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('web-assets/img/chauffeur2.jpg') }}" alt="Image 1" class="img-fluid img-thumbnail">
                </div>
            </div>
        </div>
    </section>
@endsection
