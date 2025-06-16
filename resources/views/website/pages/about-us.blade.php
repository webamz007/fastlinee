@extends('website.layouts.app')
@section('title') About Us @endsection
@section('meta')
    <meta name="title" content="About Us - Fastlinee">
    <meta name="description" content="Welcome to our world of luxury travel, where comfort, convenience, and professionalism converge in every journey. Our chauffeur service company is dedicated to providing you with a premium transportation experience">
    <meta name="keywords" content="Chauffeur Hailing, City to City Rides, Airport Transfers, Madinah Hotel to Makkah Hotel, Madinah Airport to Madinah Hotel, Madinah Hotel to Jeddah Airport, ">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
@endsection
@section('content')
<section class="sustain-section my-5">
    <div class="container">
        <h2 class="text-center pb-5">About Us</h2>
        <div class="row">
            <div class="col-md-12">
                <img src="{{ asset('web-assets/img/chauffeur2.jpg') }}" alt="Image 1" class="img-fluid img-thumbnail">
            </div>

            <div class="col-md-12 mt-4">
                <h2 class="text-center">Experience Luxury Travel with Our Premium Chauffeur Services</h2>

                <p class="text-center">
                    Welcome to our world of luxury travel, where comfort, convenience, and professionalism converge in every journey. Our chauffeur service company is dedicated to providing you with a premium transportation experience, whether it's an airport transfer, a business meeting, or a special event. Step into our diverse fleet of well-maintained luxury vehicles, including sedans, SUVs, and vans, all equipped with modern amenities to elevate your travel.

                    Our team of highly trained, experienced, and courteous chauffeurs is here to make your journey truly memorable. From warm welcomes to assisting with your luggage, we prioritize your safety and efficiency in reaching your destination. Explore our range of services designed to meet your unique needs:
                </p>

                <p class="text-left text-center">
                    <span class="d-block"><strong>Airport Transfers:</strong> Enjoy reliable and timely airport transfers featuring personalized meet and greet services, flight tracking, and additional wait time.</span>
                    <span class="d-block"><strong>Hourly Hire:</strong> Opt for our flexible and customizable hourly hire service, allowing you to book a chauffeur and vehicle for a fixed number of hours with unlimited stops and destinations within a designated service area.</span>
                    <span class="d-block"><strong>City to City:</strong> Experience long-distance rides between cities with fixed and transparent pricing, devoid of hidden fees or surcharges.</span>
                    <span class="d-block"><strong>Chauffeur Hailing:</strong> Benefit from the convenience of ride-hailing merged with the quality of a chauffeur service. Request a premium vehicle and a professional driver to pick you up within minutes.</span>
                </p>

                <p class="text-center">
                    More than just a chauffeur service company, we are your trusted travel partner, catering to your transportation needs with utmost care and attention. Committed to delivering the highest level of service and customer satisfaction, we go the extra mile for you. As a socially responsible and eco-friendly company, we offset our carbon emissions by supporting green projects worldwide, ensuring fair compensation and respect for our chauffeurs.

                    Proudly serving customers globally in major cities, we provide easy booking options online, by phone, or through our app. Enjoy the perks of our loyalty program and special offers as we anticipate the opportunity to serve you soon, making your travel experience truly memorable.
                </p>
            </div>
        </div>
    </div>
</section>
    <section class="mb-5">
        <div class="container">
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

@endsection
