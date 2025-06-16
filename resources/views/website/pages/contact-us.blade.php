@extends('website.layouts.app')

@section('title') Contact Us @endsection
@section('meta')
    <meta name="title" content="Contact Us - Fastlinee">
    <meta name="description" content="More than just a chauffeur service company, we are your trusted travel partner, catering to your transportation needs with utmost care and attention. Committed to delivering the highest level of service and customer satisfaction">
    <meta name="keywords" content="Chauffeur Hailing, City to City Rides, Airport Transfers, Madinah Hotel to Makkah Hotel, Madinah Airport to Madinah Hotel, Madinah Hotel to Jeddah Airport, ">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
@endsection

@section('content')
<div class="container my-5">
    <form action="{{ route('contact.send') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center pb-5">Contact Us</h2>
            </div>
            <div class="col-md-12 mb-3">
                <div class="d-flex justify-content-center flex-column flex-md-row">
                    <div>
                        <h6><i class="fa-solid fa-envelope me-1"></i>Email:</h6>
                        <a href="mailto:info@fastlinee.com" class="btn btn-warning me-2 mb-3">info@fastlinee.com</a>
                    </div>
                    <div>
                        <h6><i class="fa-solid fa-phone me-1"></i>Phone:</h6>
                        <a href="tel:+447481691058" class="btn btn-warning me-2 mb-3">+447481691058</a>
                    </div>
                    <div>
                        <h6><i class="fa-solid fa-phone me-1"></i>Phone:</h6>
                        <a href="tel:+13235034385" class="btn btn-warning me-2 mb-3">+13235034385</a>
                    </div>
                    <div>
                        <h6><i class="fa-solid fa-phone me-1"></i>Phone:</h6>
                        <a href="tel:+966583768028" class="btn btn-warning me-2 mb-3">+966583768028</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="subject">Subject</label>
                                    <input type="text" class="form-control" id="subject" name="subject" required>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="message">Message</label>
                                    <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <button type="submit" class="btn web-btn">Contact Us</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
