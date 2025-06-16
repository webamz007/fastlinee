<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('web.home');

// Booking Related Routes
Route::post('/booking-form', [BookingController::class, 'showBookingForm'])->name('show-form');
Route::get('/service-cars', [BookingController::class, 'getServiceCars'])->name('service-cars');
Route::get('/insert-booking', [BookingController::class, 'insertBooking'])->middleware('checkAgencyActive')->name('insert-booking');
Route::post('/get-routes', [BookingController::class, 'getRoutes']);
Route::get('/user-bookings', [BookingController::class, 'userBookings'])->middleware(['auth', 'checkAgencyActive'])->name('user-bookings');

// Services Related Routes
Route::get('/city-to-city', [HomeController::class, 'cityToCity'])->name('city-to-city');
Route::get('/chauffeur-hailing', function(){
    return view('website.pages.chauffeur-hailing');
})->name('chauffeur-hailing');
Route::get('/airport-transfers', function(){
    return view('website.pages.airport-transfers');
})->name('airport-transfers');
Route::get('/hourly-hire', function(){
    return view('website.pages.hourly-hire');
})->name('hourly-hire');

// About Contact & Terms Conditions Pages
Route::get('/about-us', function(){
    return view('website.pages.about-us');
})->name('about-us');
Route::get('/contact-us', function(){
    return view('website.pages.contact-us');
})->name('contact-us');
Route::post('/contact-us', [HomeController::class, 'sendContactUs'])->name('contact.send');

Route::get('/terms-and-conditions', function(){
    return view('website.pages.terms-conditions');
})->name('terms-conditions');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'checkAgencyActive'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/create-storage-link', function () {
    Artisan::call('storage:link');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    return 'Storage link created!';
});

require __DIR__.'/auth.php';
