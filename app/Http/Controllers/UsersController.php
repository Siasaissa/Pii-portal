<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Carbon\Carbon;

class UsersController extends Controller
{
   public function showUserPage()
    {
        return view('dash.User');
    }




public function addUser(Request $request)
{
    // 1. Validate request
    $validated = $request->validate([
        'name'  => 'required|string|max:255',
        'phone' => 'nullable|string|max:20',
        'email' => 'required|string|email|max:255|unique:users,email',
    ]);

    // 2. Generate default password
    $password = 'Pass' . rand(1000, 9999); 
    // or $password = Str::random(10);

    // 3. Create user
    $user = User::create([
        'name'     => $validated['name'],
        'phone'    => $validated['phone'] ?? null,
        'email'    => $validated['email'],
        'password' => Hash::make($password), // hash the default password
        'status'   => 'active',
    ]);

    // 4. Create password reset token
    $token = Password::createToken($user);

    // 5. Build password reset URL
    $resetUrl = url(route('password.reset', [
        'token' => $token,
        'email' => $user->email
    ], false));

    // 6. Send email
    try {
        Mail::to($user->email)->send(new WelcomeMail($user->name, $password, $resetUrl));
    } catch (\Exception $e) {
        Log::error('Email sending failed: ' . $e->getMessage());
    }

    // 7. Redirect back with message
    return redirect()->route('dash.User')
        ->with('success', 'New User added successfully!');
}



public function showUser()
{
    $users = User::all();
    $totalUsers = $users->count();
    $activeUsers = User::where('status','active')->count();

        $now = Carbon::now();
    $newCount = User::whereYear('created_at', $now->year)
    ->whereMonth('created_at', $now->month)
    ->count();

    return view('dash.User', compact('users', 'totalUsers', 'activeUsers','newCount'));
}



public function updateStatus(Request $request, $id)
{
    $user = User::findOrFail($id);
    $user->status = $request->status;
    $user->save();

    return redirect()->route('dash.User')
        ->with('success', 'New User added successfully!');
}








    //to update my customer
   public function updateUser(Request $request, $id)
{
    $user = User::findOrFail($id);

    $validated = $request->validate([
        'name'  => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $id,
    ]);

    $user->update($validated);

    return redirect()->route('dash.User')
        ->with('success', 'User information updated successfully!');
}

    public function destroyUser(Request $request, $id)
    {
        $Users = User::findOrFail($id);
        $Users->delete();


        return redirect()->route('dash.User')
        ->with('success', 'User Deleted successfully!');
    }

}
