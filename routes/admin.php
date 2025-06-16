<?php

use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceController;


Route::middleware('admin')->group(function (){
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    // Users Route
    Route::get('/users/{type?}', [UserController::class, 'index'])->name('users.index');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/users/{user}/update-approval-status', [UserController::class, 'updateApprovalStatus'])
        ->name('users.updateApprovalStatus');

// Available Routes
    Route::resource('/routes', RouteController::class);
    Route::get('/routes/{routeId}/cars', [RouteController::class, 'getCarsForRoute']);

// Services Routes
    Route::resource('/services', ServiceController::class);
    Route::get('/get-routes-and-prices', [ServiceController::class, 'getRoutesAndPrices'])->name('routes.prices');

// Car Route
    Route::resource('/cars', CarController::class);
    Route::post('/add-category', [CarController::class, 'addCarCategory'])->name('car.category');

// Booking Routen
    Route::get('/bookings/{booking_type}', [BookingController::class, 'index'])->name('bookings');
    Route::post('/update-booking-status/{booking_type}/{booking_id}', [BookingController::class, 'updateBookingStatus'])->name('update-booking-status');
    Route::delete('/delete-booking/{id}', [BookingController::class, 'destroy'])->name('delete-booking');
    Route::get('/booking/invoice/generate/{booking_id}', [BookingController::class, 'generateInvoice'])->name('invoice.generate');

    // Change Admin Password
    Route::any('/change-password', [AdminAuthController::class, 'passwordCreate'])->name('password.create');
    Route::post('/change-password', [AdminAuthController::class, 'passwordChange'])->name('password.change');
});

// Auth Routes
Route::get('login', [AdminAuthController::class, 'create'])->name('admin.login');
Route::post('login', [AdminAuthController::class, 'store'])->name('admin.login.store');
Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
