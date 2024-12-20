<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        // Generate random numbers for the numeric reCAPTCHA
        $num1 = rand(1, 9);
        $num2 = rand(1, 9);

        // Store numbers in the session
        session(['num1' => $num1, 'num2' => $num2]);

        return view('auth.admin_login');
    }

    public function login(Request $request)
    {
        // Validate the login form inputs
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'captcha' => 'required|integer',  // Validate numeric reCAPTCHA input
        ]);

        // Check the numeric reCAPTCHA
        $sum = session('num1') + session('num2');
        if ($request->captcha != $sum) {
            return back()->withErrors(['captcha' => 'Incorrect reCAPTCHA answer'])->withInput();
        }

        // Get email and password credentials
        $credentials = $request->only('email', 'password');

        // Attempt login for admin guard
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->route('backend.dashboard');  // Redirect to the backend dashboard
        }

        // If login fails, return with error message
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function logout(Request $request)
    {
        // Log out the admin
        Auth::guard('admin')->logout();

        // Invalidate the session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('frontend.admin.login.form')->with('status', 'Admin logged out successfully!');
    }
}
