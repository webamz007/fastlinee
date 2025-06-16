@extends('admin.layout.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Cars List</h4>
                        <a href="{{ route('cars.create') }}" class="btn btn-primary ml-auto">Add Cars</a>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                                <thead>
                                <tr>
                                    <th>Car ID</th>
                                    <th>Car Name</th>
                                    <th>Car Model</th>
                                    <th>Max Passengers</th>
                                    <th>Max Weight</th>
                                    <th>Category Name</th>
                                    <th>Car Image</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cars as $car)
                                    <tr>
                                        <td>{{ $car->id }}</td>
                                        <td>{{ $car->car_name }}</td>
                                        <td>{{ $car->car_model }}</td>
                                        <td>{{ $car->passengers }}</td>
                                        <td>{{ $car->weight }}</td>
                                        <td>{{ $car->category->category_name }}</td>
                                        <td><img src="{{ $car->car_image }}" alt="{{ $car->car_name }}" width="100"></td>
                                        <td>
                                            <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('cars.destroy', $car->id) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this car?')">Delete</button>
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
@endsection

