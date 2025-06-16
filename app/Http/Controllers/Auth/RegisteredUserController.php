<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Booking;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:16'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
        if (isset($request->register_type) && $request->register_type == 'agency') {
            $rules['licence_number'] = 'required';
        }
        $request->validate($rules);

        if ($request->register_type == 'agency') {
            $user = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'licence_number' => $request->licence_number,
                'user_type' => 1,
                'is_active' => 0,
                'password' => Hash::make($request->password),
            ]);

            event(new Registered($user));
        } else {

            $user = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'user_type' => 0,
                'is_active' => 1,
                'password' => Hash::make($request->password),
            ]);

            event(new Registered($user));

            Auth::login($user);
        }

        // Check for booking information in the session
        $bookingInfo = Session::get('booking_info');

        if ($bookingInfo) {
            // Process the booking with the stored information
            $response = Booking::processBooking($bookingInfo);

            // Clear the booking information from the session
            Session::forget('booking_info');
            return redirect()->route('web.home')->with('status', $response);
        }

        return redirect(RouteServiceProvider::HOME);
    }
}
