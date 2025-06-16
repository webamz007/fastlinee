<div style="position: relative;">
    <img src="{{ asset('web-assets/img/hero.jpg') }}" class="img-responsive w-100 mb-5 banner-img"
        alt="Full-width image of a car">
    <div class="booking-form-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-lg-5">
                    <form action="{{ route('show-form') }}" method="POST" class="bg-light p-4 rounded" id="booking-form">
                        @csrf
                        <h2 class="text-center mb-4">BOOK RIDE</h2>

                        <div class="mb-3">
                            <label for="booking_type" class="form-label">Booking Type:</label>
                            <select class="form-select" id="booking_type" name="booking_type" required>
                                <option value="1">One Way</option>
                                <option value="2">By Hour</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="route_id" class="form-label">Routes:</label>
                            <select class="form-select route-id" id="route_id" name="route_id" required>
                                @foreach ($routes as $route)
                                    <option value="{{ $route->id }}">{{ $route->location_from }} To
                                        {{ $route->location_to }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="booking_date" class="form-label">Date:</label>
                            <input type="date" class="form-control" id="booking_date" name="booking_date" required>
                        </div>

                        <div class="mb-3">
                            <label for="booking_time" class="form-label">Time:</label>
                            <input type="time" class="form-control" id="booking_time" name="booking_time" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn web-btn" style="width: 100%;">Book Ride</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
