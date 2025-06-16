@foreach ($routes as $route)
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="route_id">Route</label>
                <input type="text" value="{{ $route->location_from }} - {{ $route->location_to }}" class="form-control" readonly>
                <input type="hidden" name="route_ids[]" value="{{ $route->id }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="service_price">Service Price</label>
                <input type="number" name="service_prices[]" class="form-control" id="service_price" placeholder="Enter Price" value="{{ $route->service_price }}" required>
            </div>
        </div>
    </div>
@endforeach
