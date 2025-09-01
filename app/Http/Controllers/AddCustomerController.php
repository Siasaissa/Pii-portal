<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Carbon\Carbon;

class AddCustomerController extends Controller
{
    // Show customer page
    public function showCustomerPage()
    {
        return view('dash.Customers');
    }

    // Handle form submission for registration
    public function addCustomer(Request $request)
{
    // Validate the incoming request
    $validated = $request->validate([
        'name'     => 'required|string|max:255',
        'phone'    => 'required|string|max:20|unique:customers,phone',
        'email'    => 'required|string|email|max:255|unique:customers,email',
        'id_type'  => 'required|string|max:50|in:NIDA,Passport,Driving License,Voter ID',
        'id_no'    => 'required|string|max:50',
        'dob'      => 'required|date',
        'gender'   => 'required|string|in:Male,Female',
        'status'   => 'required|string|in:Active,Pending,Inactive',
    ]);

    // Generate a default password
    $password = 'Pass' . rand(1000, 9999);

    // Create the customer
    $user = Customers::create([
        'user_id'  => auth()->id(), // assign the logged-in user or null if you want
        'name'     => $validated['name'],
        'phone'    => $validated['phone'],
        'email'    => $validated['email'],
        'id_type'  => $validated['id_type'],
        'id_no'    => $validated['id_no'],
        'dob'      => $validated['dob'],
        'gender'   => $validated['gender'],
        'status'   => $validated['status'],
        'password' => Hash::make($password),
    ]);

    // Create a password reset token
    $token = Password::createToken($user);

    // Build the password reset URL
    $resetUrl = url(route('password.reset', [
        'token' => $token,
        'email' => $user->email
    ], false));

    // Send welcome email with password reset link
    try {
        Mail::to($user->email)->send(new WelcomeMail($user->name, $password, $resetUrl));
    } catch (\Exception $e) {
        Log::error('Email sending failed: ' . $e->getMessage());
    }

    return redirect()->route('dash.Customers')
        ->with('success', 'New customer added successfully!');
}



public function showCustomer()
{
    $user = auth()->user();

    if ($user->role === 'admin') {
        // Admin sees all customers
        $customers = Customers::latest()->get();
    } else {
        // Regular user sees only their own customers
        $customers = Customers::where('user_id', $user->id)
                              ->latest()
                              ->get();
    }

    // Total customers count
    $totalCustomers = $customers->count();

    // Active customers count
    $activeCount = $customers->where('status', 'active')->count();

    // New customers this month
    $now = Carbon::now();
    $newCount = $customers->filter(function ($customer) use ($now) {
        return $customer->created_at->year == $now->year &&
               $customer->created_at->month == $now->month;
    })->count();

    return view('dash.Customers', compact('customers', 'totalCustomers', 'activeCount', 'newCount'));
}








//to update my customer
public function updateCustomer(Request $request, $id)
{
    $customer = Customers::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20|unique:customers,phone,' . $id,
        'email' => 'required|string|email|max:255|unique:customers,email,' . $id,
        'id_type' => 'required|string|in:NIDA,Passport,Driving License,Voter ID',
        'id_no' => 'required|string|max:50',
        'dob' => 'required|date',
        'gender' => 'required|string|in:Male,Female,Other',
        'status' => 'required|string|in:Active,Inactive,Pending',
    ]);

    $customer->update($validated);

    return redirect()->route('dash.Customers')
        ->with('success', 'Customer information updated successfully!');
}
public function destroyCustomer(Request $request, $id)
{
    $customer = Customers::findOrFail($id);
    $customer->delete();


    return redirect()->route('dash.Customers')
        ->with('success', 'Customer has been deleted.');
}


}
