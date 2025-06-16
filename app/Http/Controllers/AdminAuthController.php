<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    /**
     * Display the login view.
     */
    public function create()
    {
        return view('admin.auth.login');
    }
    /**
     * Authenticate the Admin.
     */
    public function store(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::guard('admin')->attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('dashboard')->with('status', ['success' => true, 'msg' => 'Logged in successfully.']);
        }

        return back()->with('status', ['success' => false, 'msg' => 'Invalid email or password.']);
    }
    /**
     * Logout the Admin.
     */
    public function logout() {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('status', ['success' => true, 'msg' => 'Logout successfully.']);
    }

    /**
     * Admin Change password page show
     */
    public function passwordCreate() {
        return view('admin.pages.settings.change-password');
    }

    /**
     * Admin Change password page show
     */
    public function passwordChange(Request $request) {
        try {
            // Empty admin table

            // Define the admin credentials
            $adminEmail = 'admin@admin.com';
            $adminPassword = $request->password;

            // Create the admin user using Eloquent
            $admin = Admin::first();
            $admin->password = Hash::make($adminPassword);
            $admin->save();
            $response = ['success' => true, 'msg' => 'Password Updated'];
        } catch (\Exception $e) {
            $response = ['success' => false, 'msg' => $e->getMessage()];
        }

        return redirect()->back()->with('status', $response);
    }
}
