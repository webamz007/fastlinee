@extends('admin.layout.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Categories</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('car.category') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="category_name">Add Category</label>
                                        <input type="text" name="category_name" class="form-control" id="category_name" placeholder="Enter Car Category" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Car Category</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Cars</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('cars.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="car_name">Car Name</label>
                                        <input type="text" name="car_name" class="form-control" id="car_name" placeholder="Enter Car Name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="car_model">Car Model</label>
                                        <input type="number" name="car_model" class="form-control" id="car_model" placeholder="Enter Car Model" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="max_passengers">Max Passengers</label>
                                        <input type="number" name="passengers" class="form-control" id="max_passengers" placeholder="Enter Max Passengers" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="weight">Max Weight</label>
                                        <input type="number" name="weight" class="form-control" id="weight" placeholder="Enter Max Weight" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category_id">Select Category</label>
                                        <select name="category_id" class="form-control select2" id="category_id" required>
                                            <option value="">__ Select Category __</option>
                                            @foreach( $categories as $category )
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="car_image">Car Image</label>
                                        <input type="file" name="car_image" class="form-control" id="car_image" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">Add New Car</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

