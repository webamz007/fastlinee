@extends('admin.layout.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Bookings</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                <thead>
                                <tr>
                                    <th>Booking Id</th>
                                    <th>User Type</th>
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
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($bookings as $booking)
                                    <tr>
                                        <td>{{ $booking->id }}</td>
                                        <td>
                                            @if( $booking->user_type == 0 )
                                                <span class="badge badge-primary">User - {{ $booking->user_name }}</span>
                                            @else
                                                <span class="badge badge-success">Agency - {{ $booking->user_name }}</span>
                                            @endif
                                        </td>
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
                                        <td>
                                            @if ($booking->status == 0)
                                            <form id="form-{{ $booking->id }}" method="POST" action="{{ route('update-booking-status', ['active', $booking->id]) }}">
                                                @csrf
                                                <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                                                <button type="button" class="copy-button btn btn-success" data-booking='{{ json_encode($booking) }}'>Assign Driver</button>
                                            </form>
                                            <a href="{{ route('invoice.generate', $booking->id) }}" class="btn btn-primary mt-2">Make Invoice</a>
                                            @elseif ($booking->status == 1)
                                            <form method="POST" action="{{ route('update-booking-status', ['remove', $booking->id]) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-danger">Remove Driver</button>
                                            </form>
                                            <a href="{{ route('invoice.generate', $booking->id) }}" class="btn btn-primary mt-2">Make Invoice</a>
                                            @else
                                            <form method="POST" action="{{ route('delete-booking', $booking->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this booking?')">Delete Booking</button>
                                            </form>
                                            <a href="{{ route('invoice.generate', $booking->id) }}" class="btn btn-primary mt-2">Make Invoice</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
    let copyButtons = document.querySelectorAll('.copy-button');

    copyButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            let bookingData = JSON.parse(this.getAttribute('data-booking'));
            confirmAndAssignDriver(bookingData);
        });
    });

    function confirmAndAssignDriver(bookingData) {
        // Display a confirmation dialog
        let confirmation = confirm('Are you sure you want to assign a driver for this booking?');

        if (confirmation) {
            copyMessageToDriver(bookingData);
            submitFormToChangeStatus(bookingData.id);
        }
    }

    function copyMessageToDriver(bookingData) {
        let message = `Hello Driver,\n\n`
                    + `User Name: ${bookingData.booking_for === 'me' ? bookingData.user_name : bookingData.name}\n`
                    + `User Email: ${bookingData.booking_for === 'me' ? bookingData.user_email : bookingData.email}\n`
                    + `User Phone: ${bookingData.booking_for === 'me' ? bookingData.user_phone : bookingData.phone}\n`
                    + `Location From: ${bookingData.location_from}\n`
                    + `Location To: ${bookingData.location_to}\n`
                    + `Car Name: ${bookingData.car_name}\n`
                    + `Pickup Date Time: ${bookingData.booking_date}\n`
                    + `Total Price: ${bookingData.total_price}\n`;

        // Create a temporary textarea element to copy the text
        let tempTextArea = document.createElement('textarea');
        tempTextArea.value = message;
        document.body.appendChild(tempTextArea);

        // Select the text in the textarea
        tempTextArea.select();
        tempTextArea.setSelectionRange(0, 99999); // For mobile devices

        // Execute the copy command
        document.execCommand('copy');

        // Remove the temporary textarea
        document.body.removeChild(tempTextArea);

        // Display a confirmation message to the user
        alert('Message copied to clipboard for the driver.');
    }

    function submitFormToChangeStatus(bookingId) {
        // Find the form by ID
        let form = document.getElementById(`form-${bookingId}`);

        // Submit the form
        form.submit();
    }
});

</script>

@endsection

