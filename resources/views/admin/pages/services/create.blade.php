@extends('admin.layout.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add & Update Services</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('services.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="car_id">Select Cars</label>
                                        <select name="car_id" id="car_id" class="form-control select2" required>
                                            @foreach ($cars as $car)
                                                <option value="{{ $car->id }}">{{ $car->car_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div id="routesContainer">
                                <!-- Routes and Prices will be dynamically added here -->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Add & Update Service</button>
                                </div>
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
    $(document).ready(function () {

        fetchRoutesAndPrices();

        // Triggered when car selection changes
        $('#car_id').change(function () {
            fetchRoutesAndPrices();
        });

        function fetchRoutesAndPrices() {
            var carId = $('#car_id').val();

            // AJAX request to fetch routes and prices
            $.ajax({
                url: '{{ route('routes.prices') }}',
                type: 'GET',
                data: { car_id: carId },
                success: function (data) {
                    // Update the routesContainer with fetched data
                    $('#routesContainer').html(data);
                },
                error: function (xhr, status, error) {
                    console.error('Error fetching routes and prices:', error);
                }
            });
        }
    });
</script>
@endsection

