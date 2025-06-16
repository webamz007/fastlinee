@extends('admin.layout.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update route Detail</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('routes.update', $route->id) }}" method="POST">
                            @csrf @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="location_from">Location From</label>
                                        <input type="text" name="location_from" value="{{ $route->location_from }}" class="form-control" id="location_from" placeholder="Enter Location From" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="location_to">Location To</label>
                                        <input type="text" name="location_to" value="{{ $route->location_to }}" class="form-control" id="location_to" placeholder="Enter Location To">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">Update route</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

