<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::get();
        return view('admin.pages.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = CarCategory::get();
        return view('admin.pages.cars.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            $request->validate([
                'car_name' => 'required|string',
                'car_model' => 'required|string',
                'passengers' => 'required|integer',
                'weight' => 'required|numeric',
                'category_id' => 'required',
                'car_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $car = new Car([
                'car_name' => $request->input('car_name'),
                'car_model' => $request->input('car_model'),
                'passengers' => $request->input('passengers'),
                'weight' => $request->input('weight'),
                'category_id' => $request->input('category_id'),
            ]);

            if ($request->hasFile('car_image')) {
                $imagePath = $request->file('car_image')->store('car_images', 'public');
                $car->car_image = $imagePath;
            }

            $car->save();
            $output = ['success' => true, 'msg' => 'Car added successfully.'];
            return redirect()->route('cars.index')->with('status', $output);

        } catch (\Exception $e) {
            $output = ['success' => false, 'msg' => $e->getMessage()];
            return redirect()->route('cars.create')->with('status', $output);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $car)
    {
        $categories = CarCategory::get();
        return view('admin.pages.cars.edit', compact('car', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Car $car)
    {
        try {
            $request->validate([
                'car_name' => 'required|string',
                'car_model' => 'required|integer',
                'passengers' => 'required|integer',
                'weight' => 'required|integer',
                'category_id' => 'required',
                'car_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $car = Car::findOrFail($car->id);

            $car->fill([
                'car_name' => $request->input('car_name'),
                'car_model' => $request->input('car_model'),
                'passengers' => $request->input('passengers'),
                'weight' => $request->input('weight'),
                'category_id' => $request->input('category_id'),
            ]);

            // Update the car image if a new one is provided
            if ($request->hasFile('car_image')) {
                // Delete the old car image file if it exists
                if ($car->car_image) {
                    Storage::delete($car->car_image);
                }

                $imagePath = $request->file('car_image')->store('car_images', 'public');
                $car->car_image = $imagePath;
            }

            $car->save();

            $output = [
                'success' => true,
                'msg' => 'Car updated successfully',
            ];
        } catch (\Exception $e) {
            $output = [
                'success' => false,
                'msg' => $e->getMessage(),
            ];
        }

        return redirect()->route('cars.index')->with('status', $output);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $car = Car::findOrFail($id);

            // Delete the associated car image file if it exists
            if ($car->car_image) {
                Storage::delete($car->car_image);
            }

            $car->delete();

            $output = [
                'success' => true,
                'msg' => 'Car deleted successfully',
            ];
        } catch (\Exception $e) {
            $output = [
                'success' => false,
                'msg' => $e->getMessage(),
            ];
        }

        return redirect()->route('cars.index')->with('status', $output);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function addCarCategory(Request $request)
    {
        try {
            $category = new CarCategory();
            $category->category_name = $request->category_name;
            $category->save();

            $output = [
                'success' => true,
                'msg' => 'Category added successfully',
            ];
        } catch (\Exception $e) {
            $output = [
                'success' => false,
                'msg' => $e->getMessage(),
            ];
        }

        return redirect()->route('cars.index')->with('status', $output);
    }
}
