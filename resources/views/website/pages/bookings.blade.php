@extends('website.layouts.app')

@section('title') Bookings @endsection

@section('content')

<div class="container my-5">
    <h2 class="text-center pb-5">Bookings</h2>
    <div class="card filter-card mb-5">
        <div class="card-body">
          <h5 class="card-title mb-4">Filter Bookings</h5>
          <form action="{{ route('user-bookings')}}">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="booking_date">Select Date</label>
                        <input type="date" name="booking_date" class="form-control" id="booking_date">
                      </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="booking_date">Booking Type</label>
                        <select name="booking_type" class="form-control" id="booking_date">
                          <option value="upcoming">Upcoming Booking</option>
                          <option value="active">Active Booking</option>
                          <option value="past">Past Booking</option>
                        </select>
                      </div>
                </div>
            </div>
            <button type="submit" class="btn btn-dark mt-3">Filter</button>
          </form>
        </div>
      </div>
    <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-dark mb-4" data-bs-toggle="modal" data-bs-target="#myModal">
            Book Ride
        </button>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered display" id="bookingsTable">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone No</th>
                    <th>Booking Type</th>
                    <th>Location From</th>
                    <th>Location To</th>
                    <th>Serives Class</th>
                    <th>Chauffeurs Notes</th>
                    <th>Pickup Date Time</th>
                    <th>Total Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->booking_for === 'me' ? $booking->user_name : $booking->name }}</td>
                        <td>{{ $booking->booking_for === 'me' ? $booking->user_email : $booking->email }}</td>
                        <td>{{ $booking->booking_for === 'me' ? $booking->user_phone : $booking->phone }}</td>
                        <td>{{ $booking->booking_type === 1 ? 'One Way' : 'Hourly' }}</td>
                        <td>{{ $booking->location_from }}</td>
                        <td>{{ $booking->location_to }}</td>
                        <td>{{ $booking->category_name }} - {{ $booking->car_name }}</td>
                        <td>{{ $booking->Chauffeur_notes }}</td>
                        <td>{{ $booking->booking_date }}</td>
                        <td>{{ number_format($booking->total_price) }} SR</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
<!-- The Modal -->
<div class="modal fade" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal body -->
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('show-form')}}" method="POST" class="bg-light p-4 rounded" id="booking-form">
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
                                <select class="form-select route-id" id="route_id" name="route_id" required></select>
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

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
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

            // Initialize JQuery datatable
            let table = new DataTable('#bookingsTable', {
                responsive: true
            });

            updateRoutes();

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

                        // Clear existing options
                        routeSelect.empty();

                        // Add an empty option
                        routeSelect.append('<option value="">Select a location</option>');

                        // Populate the options if routes are available
                        if (routes.length > 0) {
                            routeSelect.prop('disabled', false);
                            $.each(routes, function(index, route) {
                                routeSelect.append('<option value="' + route.id + '">' + route.location_from + (bookingType == 2 ? '' : ' To ' + route.location_to) + '</option>');
                            });
                        } else {
                            // Optionally, you can disable the select element if there are no routes
                            routeSelect.prop('disabled', true);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching routes:', error);
                    }
                });

            }
        });
    </script>
@endsection
