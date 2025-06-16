<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $guarded = ['status'];

    public static function processBooking($bookingInfo) {
       try {

            $route_id = $bookingInfo['route_id'];
            $car_id = $bookingInfo['car_id'];
            $booking_type = $bookingInfo['booking_type'];
            $hours = NULL;
            $service_price = Service::where('route_id', $route_id)->where('car_id', $car_id)->value('service_price');

            if ($booking_type == 2) {
                $hours = $bookingInfo['hours'];
                $service_price = $hours * $service_price;
            }

            // Create a new Booking instance
            $booking = new Booking();

            // Set the values for the model attributes using the stored booking information
            $booking->route_id = $route_id;
            $booking->car_id = $car_id;
            $booking->booking_type = $booking_type;
            $booking->booking_for = $bookingInfo['booking_for'];
            $booking->hours = $hours;
            $booking->name = $bookingInfo['name'];
            $booking->email = $bookingInfo['email'];
            $booking->phone = $bookingInfo['phone'];
            $booking->chauffeur_notes = $bookingInfo['chauffeur_notes'];
            $booking->booking_date = Carbon::parse($bookingInfo['booking_date'])->format('Y-m-d H:i:s');
            $booking->user_id = auth()->id(); // Use the authenticated user's ID
            $booking->total_price = $service_price;

            // Save the booking to the database
            $booking->save();

            $response = ['success' => true, 'msg' => 'Booking created successfully'];
       } catch(\Exception $e) {
            $response = ['success' => false, 'msg' => $e->getMessage()];
       }

       return $response;
    }

}
