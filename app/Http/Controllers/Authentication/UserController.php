<?php

namespace App\Http\Controllers\Authentication;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Show the registration form
    public function showRegisterForm()
    {
        return view('Authentication.register');
    }

    // Handle form submission for registration
    public function register(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:3|confirmed',
        ]);

        // Create the user
        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Send the welcome email (log errors if email fails)
        try {
            Mail::to($user->email)->send(new WelcomeMail($user->name));
        } catch (\Exception $e) {
            Log::error('Email sending failed: ' . $e->getMessage());
        }

        // Redirect after saving and sending email
        return redirect('/Authentication/login')
            ->with('success', 'Account created successfully! Check your email.');
    }

    // Show the login form
    public function showLoginForm()
    {
        return view('Authentication.login');
    }

    // Handle login form submission
// Handle login form submission
public function login(Request $request)
{
    $maxAttempts = 3;
    $lockoutTime = 60; // seconds

    // Get attempts and lockout time from session
    $attempts = session()->get('login_attempts', 0);
    $lockoutUntil = session()->get('lockout_until', null);

    // If user is locked out
    if ($lockoutUntil && now()->lt($lockoutUntil)) {
        $secondsLeft = now()->diffInSeconds($lockoutUntil);
        return back()
            ->withErrors(['email' => "Too many failed attempts. Try again in {$secondsLeft} seconds."])
            ->with('lockout_until', $lockoutUntil->timestamp);
    }

    // Validate input
    $credentials = $request->validate([
        'email'    => 'required|email',
        'password' => 'required|string',
    ]);

    // Check if user exists
    $user = User::where('email', $credentials['email'])->first();

    if (!$user) {
        return back()->withErrors(['email' => 'No account found with this email.']);
    }

    // Check if user is active
    if ($user->status !== 'active') {
        return back()->withErrors(['email' => 'Your account is inactive. Please contact admin.']);
    }

    // If login is successful
    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        // Reset lockout data
        session()->forget(['login_attempts', 'lockout_until']);

        return redirect('login.form')
            ->with('success', 'Login successful! Redirecting to dashboard...');
    }

    // Increment failed attempts
    $attempts++;
    session()->put('login_attempts', $attempts);

    // If reached max attempts
    if ($attempts >= $maxAttempts) {
        $lockoutUntil = now()->addSeconds($lockoutTime);
        session()->put('lockout_until', $lockoutUntil);

        return back()
            ->withErrors(['email' => "Too many failed attempts. Wait {$lockoutTime} seconds."])
            ->with('lockout_until', $lockoutUntil->timestamp);
    }

    // Wrong password, still have attempts
    return back()
        ->withErrors(['email' => "Invalid login. Attempts left: " . ($maxAttempts - $attempts)]);
}



    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('authentication/login')->with('success', 'You have been logged out.');
    }
}
