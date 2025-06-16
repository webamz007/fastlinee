<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use App\Models\Route;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function index() {
        $ourRoutes = Route::get();
        return view('website.pages.home', compact('ourRoutes'));
    }

    public function cityToCity() {
        $ourRoutes = Route::get();
        return view('website.pages.city-to-city', compact('ourRoutes'));
    }

    // Contact Us Function
    public function sendContactUs(Request $request) {
        try {
            $data = $request->validate([
                'subject'=> 'required|min:5',
                'email'=> 'required|email',
                'message'=> 'required|min:5',
            ]);
            Mail::to('info@fastlinee.com')->send(new ContactUs($data));
            $response = ['success' => true, 'msg' => 'Your query has been submitted.'];
        } catch (\Exception $e) {
            $response = ['success' => false, 'msg' => $e->getMessage()];
        }
        return redirect()->back()->with('status', $response);
    }
}
