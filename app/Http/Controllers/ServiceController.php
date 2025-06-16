<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Route;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::select('services.id', 'services.service_price', 'routes.location_from', 'routes.location_to', 'cars.car_name', 'cars.car_image')
        ->join('cars', 'services.car_id', 'cars.id')
        ->join('routes', 'services.route_id', 'routes.id')
        ->get();
        return view('admin.pages.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $routes = Route::get();
        $cars = Car::get();
        return view('admin.pages.services.create', compact('routes', 'cars'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'car_id' => 'required',
                'route_ids' => 'required|array',
                'service_prices' => 'required|array',
                'service_prices.*' => 'required|numeric',
            ]);

            $services = [];

            foreach ($data['route_ids'] as $key => $routeId) {
                $service = Service::where('car_id', $data['car_id'])
                    ->where('route_id', $routeId)
                    ->first();

                if ($service) {
                    // If service exists, update the price
                    $service->update(['service_price' => $data['service_prices'][$key]]);
                } else {
                    // If service doesn't exist, create a new one
                    $services[] = [
                        'car_id' => $data['car_id'],
                        'route_id' => $routeId,
                        'service_price' => $data['service_prices'][$key],
                    ];
                }
            }

            // Insert new services if any
            if (!empty($services)) {
                Service::insert($services);
            }

            $response = [
                'success' => true,
                'msg' => 'Services stored successfully',
            ];
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'msg' => 'Error storing services: ' . $e->getMessage(),
            ];
        }

        return redirect()->back()->with('status', $response);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {

        return view('admin.pages.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'service_price' => 'required',
            ]);
            $service = Service::find($id);
            $service->service_price = $request->service_price;
            $service->save();

            $output = [
                'success' => true,
                'msg' => 'Service updated successfully',
            ];

        } catch (\Exception $e) {
            $output = [
                'success' => false,
                'msg' => $e->getMessage(),
            ];
        }

        return redirect()->route('services.index')->with('status', $output);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $service = Service::findOrFail($id);

            $service->delete();

            $output = [
                'success' => true,
                'msg' => 'Service deleted successfully',
            ];
        } catch (\Exception $e) {
            $output = [
                'success' => false,
                'msg' => $e->getMessage(),
            ];
        }

        return redirect()->route('services.index')->with('status', $output);
    }

    /**
     * Get routes and prices
     */
    public function getRoutesAndPrices(Request $request)
    {
        $carId = $request->input('car_id');

        // Retrieve routes with and without service prices
        $routes = DB::table('routes')
        ->leftJoin('services', function ($join) use ($carId) {
            $join->on('routes.id', '=', 'services.route_id')
                ->where('services.car_id', '=', $carId);
        })
        ->select('routes.*', 'services.service_price')
        ->get();

        return view('admin.pages.services.routes-and-prices', ['routes' => $routes]);
    }

}
