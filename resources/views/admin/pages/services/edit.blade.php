@extends('admin.layout.app')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Service Price</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('services.update', $service->id) }}" method="POST">
                            @csrf @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="service_price">Service Price</label>
                                        <input type="number" name="service_price" value="{{ $service->service_price}}" class="form-control" id="service_price" placeholder="Enter Price" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary">Update Service Price</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

