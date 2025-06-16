@extends('admin.layout.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Car Detail</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('cars.update', $car->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="car_name">Car Name</label>
                                        <input type="text" name="car_name" value="{{ $car->car_name}}" class="form-control" id="car_name" placeholder="Enter Car Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="car_model">Car Model</label>
                                        <input type="number" name="car_model" value="{{ $car->car_model}}" class="form-control" id="car_model" placeholder="Enter Car Model" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="max_passengers">Max Passengers</label>
                                        <input type="number" name="passengers" value="{{ $car->passengers}}" class="form-control" id="max_passengers" placeholder="Enter Max Passengers" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="weight">Max Weight</label>
                                        <input type="number" name="weight" value="{{ $car->weight}}" class="form-control" id="weight" placeholder="Enter Max Weight" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category_id">Select Category</label>
                                        <select name="category_id" class="form-control select2" id="category_id" required>
                                            <option value="">__ Select Category __</option>
                                            @foreach( $categories as $category )
                                            <option value="{{ $category->id }}" {{ $category->id == $car->category_id ? 'selected' : '' }}>
                                                {{ $category->category_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="car_image">Car Image</label>
                                        <input type="file" name="car_image" class="form-control" id="car_image">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">Update Car</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

