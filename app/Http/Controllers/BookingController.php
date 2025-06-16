<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Route;
use App\Models\Booking;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class BookingController extends Controller
{
    // Admin Routes
    public function index($booking_type)
    {
        $bookings = $this->getBookings($booking_type);
        return view('admin.pages.bookings.index', compact('bookings'));
    }

    public function getBookings($booking_type, $userId = null, $booking_date = null) {
        $currentDateTime = Carbon::now();
        $bookings = Booking::select(
            'bookings.id',
            'bookings.name',
            'bookings.email',
            'bookings.phone',
            'bookings.booking_type',
            'bookings.booking_for',
            'bookings.Chauffeur_notes',
            'bookings.status',
            'bookings.booking_date',
            'bookings.total_price',
            'users.name as user_name',
            'users.email as user_email',
            'users.phone as user_phone',
            'users.user_type',
            'routes.location_from',
            'routes.location_to',
            'cars.car_name',
            'car_categories.category_name'
        )
            ->join('users', 'bookings.user_id', 'users.id')
            ->join('routes', 'bookings.route_id', 'routes.id')
            ->join('cars', 'bookings.car_id', 'cars.id')
            ->join('car_categories', 'cars.category_id', 'car_categories.id');

        if ($booking_type == 'upcoming') {
            $bookings->where('bookings.status', 0);
        } elseif ($booking_type == 'active') {
            $bookings->where('bookings.status', 1)->where('bookings.booking_date', '>=', $currentDateTime);
        } elseif ($booking_type == 'past') {
            $bookings->where('bookings.booking_date', '<=', $currentDateTime);
        }

        if ($userId != null) {
            $bookings->where('bookings.user_id', $userId);
        }

        if ($booking_date != null) {
            $bookings->whereDate('bookings.booking_date', $booking_date);
        }

        $bookings = $bookings->get();
        return $bookings;
    }


    // Update Booking Status
    public function updateBookingStatus($bookingType, $bookingID) {
        try {
            // Find the booking by ID
            $booking = Booking::findOrFail($bookingID);

            // Update the status (assuming 'status' is a field in your bookings table)
            if($bookingType == 'active') {
                $booking->status = 1;
                $booking->save();
                return redirect()->route('bookings', 'active')->with('status', ['success' => true, 'msg' => 'Booking Assigned to driver']);

            } else {
                $booking->status = 0;
                $booking->save();
                return redirect()->route('bookings', 'upcoming')->with('status', ['success' => true, 'msg' => 'Driver Removed']);
            }

            $booking->save();

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    // Delete Booking By Admin
    public function destroy($id)
    {
        try {
            // Find the booking by ID
            $booking = Booking::findOrFail($id);

            // Delete the booking
            $booking->delete();

            return back()->with('status', ['success' => true, 'msg' => 'Booking deleted successfully']);

        } catch (\Exception $e) {
            return back()->with('status', ['success' => false, 'msg' => $e->getMessage()]);
        }
    }

    // Web Routes

    public function getRoutes(Request $request)
    {
        $bookingType = $request->input('booking_type');

        if ($bookingType == 1) {
            $routes = Route::whereNotNull('location_to')->get();
        } else {
            $routes = Route::whereNull('location_to')->get();
        }

        return response()->json(['routes' => $routes]);
    }


    // Show multistep booking form
    public function showBookingForm(Request $request) {
        $route_id = $request->route_id;
        $booking_type = $request->booking_type;
        $booking_date = $request->booking_date;
        $booking_time = $request->booking_time;
        $dateTimeString = $booking_date . ' ' . $booking_time;
        $formatedBookingDate = Carbon::parse($dateTimeString)->format('D, M j, Y \a\t g:i A');
        $route = Route::find($route_id);
        $location_from = $route->location_from;
        $location_to = $route->location_to;
        $service_price = $route->service_price;

        return view('website.pages.booking-form', compact('route_id', 'booking_type', 'booking_date', 'formatedBookingDate', 'booking_time', 'location_from', 'location_to', 'service_price'));
    }
    // Get car details against services
    public function getServiceCars(Request $request) {
        $routeID = $request->routeId;
        $passengers = $request->passengers;

        $carDetails = Car::select(
            'cars.id',
            'cars.car_name',
            'cars.weight',
            'cars.passengers',
            'cars.car_image',
            'services.service_price',
            'car_categories.category_name'
        )
            ->join('services', 'cars.id', '=', 'services.car_id')
            ->join('car_categories', 'cars.category_id', '=', 'car_categories.id')
            ->where('services.route_id', $routeID);
        if ($passengers <= 7) {
            $carDetails->where('cars.passengers', '<=', 7);
        } else {
            $carDetails->where('cars.passengers', '>', 7);
        }

        $carDetails = $carDetails->get();

        return response()->json($carDetails);
    }

    // Insert Booking
    public function insertBooking(Request $request) {
        try {

            // Validate the incoming request data
            $request->validate([
                'route_id' => 'required',
                'car_id' => 'required',
                'booking_for' => 'required',
                'booking_date' => 'required',
            ]);

            if (auth()->check()) {
                $response = Booking::processBooking($request->all());
            } else {
                session()->put('booking_info', $request->all());
                return redirect()->route('login');
            }

            // If the save is successful, return a success response
            return redirect()->route('web.home')->with('status', $response);

        } catch (\Exception $e) {
            // If an exception occurs, return an error response
            return redirect()->route('web.home')->with('status', $response);
        }
    }

    // Get bookings to show user
    public function userBookings(Request $request){
        $userId = auth()->id();
        $booking_type = $request->booking_type;
        $booking_date = $request->booking_date;
        if ($booking_type == '') {
            $booking_type = 'upcoming';
        }

        $bookings = $this->getBookings($booking_type, $userId, $booking_date);

        return view('website.pages.bookings', compact('bookings'));
    }

    // Download the invoice
    public function generateInvoice($booking_ID) {

        $booking = Booking::select(
            'bookings.id',
            'bookings.total_price',
            'users.name as user_name',
            'users.email as user_email',
            'users.phone as user_phone',
            'routes.location_from',
            'routes.location_to'
        )
            ->join('users', 'bookings.user_id', 'users.id')
            ->join('routes', 'bookings.route_id', 'routes.id')
            ->join('cars', 'bookings.car_id', 'cars.id')
            ->join('car_categories', 'cars.category_id', 'car_categories.id')
            ->find($booking_ID);
        $today = Carbon::now()->format('Y-m-d');
        $pdf = Pdf::loadView('admin.pages.invoice.index', compact('booking'));
        return $pdf->download('invoice'.$booking_ID.'-'.$today.'.pdf');
    }
}
