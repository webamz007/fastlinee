@extends('admin.layout.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Services</h4>
                        <a href="{{ route('services.create') }}" class="btn btn-primary ml-auto">Add & Update Service</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                <thead>
                                <tr>
                                    <th>Service ID</th>
                                    <th>Service Price</th>
                                    <th>Location From</th>
                                    <th>Location To</th>
                                    <th>Car Name</th>
                                    <th>Car Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($services as $service)
                                    <tr>
                                        <td>{{ $service->id }}</td>
                                        <td>{{ $service->service_price }}</td>
                                        <td>{{ $service->location_from }}</td>
                                        <td>{{ $service->location_to }}</td>
                                        <td>{{ $service->car_name }}</td>
                                        <td><img src="{{ Storage::url($service->car_image) }}" alt="{{ $service->car_name }}" width="100" class="img-fluid img-thumbnail"></td>
                                        <td>
                                            <a href="{{ route('services.edit', $service->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('services.destroy', $service->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this service?')">Delete</button>
                                            </form>
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
    <!-- Include Bootstrap modal in your main layout file -->
<div class="modal fade" id="carsModal" tabindex="-1" role="dialog" aria-labelledby="carsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="carsModalLabel">Cars for route #<span id="routeId"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <th>Car ID</th>
                            <th>Car Name</th>
                            <th>Car Image</th>
                        </tr>
                    </thead>
                    <tbody id="carsTableBody"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    function showCars(routeId) {
        document.getElementById('routeId').innerText = routeId;

        fetch('/admin/services/' + routeId + '/cars')
            .then(response => {
                if (!response.ok) {
                    throw new Error('Error fetching cars data');
                }
                return response.json();
            })
            .then(data => {
                var carsTableBody = document.getElementById('carsTableBody');
                carsTableBody.innerHTML = '';

                if (data.length === 0) {
                    var row = document.createElement('tr');
                    row.innerHTML = `
                        <td colspan="3" class="text-center">No cars found for this route</td>
                    `;
                    carsTableBody.appendChild(row);
                } else {
                    data.forEach(car => {
                        var row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${car.id}</td>
                            <td>${car.car_name}</td>
                            <td><img src="${car.car_image}" alt="${car.car_name}" style="max-width: 100px;"></td>
                        `;
                        carsTableBody.appendChild(row);
                    });
                }

                $('#carsModal').modal('show');
            })
            .catch(error => {
                console.error('Error fetching cars data', error);

                iziToast.error({
                    title: 'Error',
                    message: 'Failed to fetch cars data',
                    position: 'topRight'
                });
            });
    }
</script>
@endsection
