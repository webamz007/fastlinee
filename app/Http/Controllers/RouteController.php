<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $routes = Route::get();
        return view('admin.pages.routes.index', compact('routes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.routes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        try {

            DB::beginTransaction();

            $request->validate([
                'location_from' => 'required|string',
            ]);
            
            // Create a new route
            $route = Route::create([
                'location_from' => $request->input('location_from'),
                'location_to' => $request->input('location_to')
            ]);

            DB::commit();

            $output = [
                'success' => true,
                'msg' => 'Route created successfully',
            ];

            return redirect()->route('routes.index')->with('status', $output);
        } catch (\Exception $e) {
            DB::rollBack();
            $output = [
                'success' => false,
                'msg' => 'Failed to add route. Error: ' . $e->getMessage(),
            ];

            return redirect()->route('routes.create')->with('status', $output);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Route $route)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Route $route)
    {
        $cars = Car::get();
        return view('admin.pages.routes.edit', compact('route', 'cars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'location_from' => 'required|string',
        ]);

        DB::beginTransaction();

        try {
            $route = route::findOrFail($id);

            // Update route details
            $route->update([
                'location_from' => $request->input('location_from'),
                'location_to' => $request->input('location_to'),
            ]);

            DB::commit();

            $output = [
                'success' => true,
                'msg' => 'Route updated successfully',
            ];

            return redirect()->route('routes.index')->with('status', $output);
        } catch (\Exception $e) {
            DB::rollBack();

            $output = [
                'success' => false,
                'msg' => 'Failed to update route. Error: ' . $e->getMessage(),
            ];

            return redirect()->route('routes.index')->with('status', $output);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            $route = Route::findOrFail($id);

            // Delete the route
            $route->delete();

            DB::commit();

            $output = [
                'success' => true,
                'msg' => 'Route deleted successfully',
            ];

            return redirect()->route('routes.index')->with('status', $output);
        } catch (\Exception $e) {
            DB::rollBack();

            $output = [
                'success' => false,
                'msg' => 'Failed to delete route. Error: ' . $e->getMessage(),
            ];

            return redirect()->route('routes.index')->with('status', $output);
        }
    }

    /**
     * Get cars for serive
     */
    public function getCarsForRoute($routeId)
    {
        $cars = Car::whereHas('routes', function ($query) use ($routeId) {
            $query->where('route_id', $routeId);
        })->get();

        return response()->json($cars);
    }
}
