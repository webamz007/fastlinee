<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Route;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard() {
        $users = User::count();
        $upcoming_bookings = Booking::where('status', 0)->count();
        $active_bookings = Booking::where('status', 1)->count();
        $routes = Route::count();
        return view('admin.pages.dashboard', compact('users', 'upcoming_bookings', 'active_bookings', 'routes'));
    }
}
