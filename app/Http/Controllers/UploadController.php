<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ModelImport;
use App\Models\User;

class UploadController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv'
        ]);

        Excel::import(new ModelImport, $request->file('file'));

        return back()->with('success', 'File imported successfully!');
    }

    public function access(){
        $trackers = Upload::where('status', 'active')
                  ->whereNull('user_id')
                  ->get();

        $users = User::where('role','user')->get();

        return view('dash.Setting' ,compact('trackers','users'));
    }

public function distribute(Request $request)
{
    $plan = $request->input('plan');

    if ($plan === 'all') {
        // 1. Get all active uploads
        $uploads = \DB::table('uploads')->where('status', 'active')->get();
        $totalUploads = $uploads->count();

        if ($totalUploads === 0) {
            return back()->with('error', 'No active uploads found.');
        }

        // 2. Get all users
        $users = User::all();
        $totalUsers = $users->count();

        if ($totalUsers === 0) {
            return back()->with('error', 'No users available for distribution.');
        }

        // 3. Calculate how many rows each user should get (same number for all)
        $perUser = intdiv($totalUploads, $totalUsers); 

        if ($perUser === 0) {
            return back()->with('error', 'Not enough uploads to distribute equally.');
        }

        // 4. Prepare data for distribution
        $uploadsArray = $uploads->pluck('id')->toArray();
        $index = 0;

        foreach ($users as $user) {
            // Assign only $perUser rows to each user
            $assignments = array_slice($uploadsArray, $index, $perUser);

            if (!empty($assignments)) {
                \DB::table('uploads')
                    ->whereIn('id', $assignments)
                    ->update(['user_id' => $user->id]);
            }

            $index += $perUser;
        }

        return back()->with('success', "Distributed {$perUser} uploads to each user.");
    }

    // --- If distribution is for specific user ---
    if ($plan === 'specific') {
        $userId = $request->input('target_user');
        $number = (int) $request->input('number');

        if (!$userId || $number <= 0) {
            return back()->with('error', 'Please select a valid user and number.');
        }

        // Pick the first $number active uploads
        $uploads = \DB::table('uploads')
            ->where('status', 'active')
            ->limit($number)
            ->pluck('id');

        if ($uploads->isEmpty()) {
            return back()->with('error', 'No active uploads available.');
        }

        \DB::table('uploads')
            ->whereIn('id', $uploads)
            ->update(['user_id' => $userId]);

        return back()->with('success', "Assigned {$uploads->count()} uploads to the selected user.");
    }

    return back()->with('error', 'Invalid distribution plan.');
}

}
