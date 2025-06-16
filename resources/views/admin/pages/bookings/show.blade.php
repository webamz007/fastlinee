@extends('admin.layout.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User Booking</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="">User Name</label>
                                <input type="text" value="Hassan" class="form-control" readonly>
                            </div>
                        </form>
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
                copyMessageToDriver(bookingData);
            });
        });

        function copyMessageToDriver(bookingData) {
            let message = `Hello Driver,\n\n`
                        + `User Name: ${bookingData.booking_for === 'me' ? bookingData.user_name : bookingData.name}\n`
                        + `User Email: ${bookingData.booking_for === 'me' ? bookingData.user_email : bookingData.email}\n`
                        + `User Phone: ${bookingData.booking_for === 'me' ? bookingData.user_phone : bookingData.phone}\n`
                        + `Location From: ${bookingData.location_from}\n`
                        + `Location To: ${bookingData.location_to}\n`
                        + `Car Name: ${bookingData.car_name}\n`
                        + `Total Price: ${bookingData.service_price}\n`;

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

            // You can also display a confirmation message to the user
            alert('Message copied to clipboard for the driver.');
        }
    });
</script>



@endsection

