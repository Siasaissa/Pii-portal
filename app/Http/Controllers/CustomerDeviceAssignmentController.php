<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\tarriff;
use App\Models\Upload;
use App\Models\CustomerDeviceAssignment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CustomerDeviceAssignmentController extends Controller
{
    // Show assignment form
public function create()
{
    $user = auth()->user();

    if ($user->role === 'admin') {
        $customers = Customers::where('status', 'pending')->get();
    } else {
        $customers = Customers::where('status', 'pending')
                              ->where('user_id', $user->id)
                              ->get();
    }
    
    $devices = Upload::where('status', 'active')
                        ->where('user_id', $user->id)
                        ->get();

    $CustomerAll = CustomerDeviceAssignment::all()->map(function($assignment) {
        $created = Carbon::parse($assignment->created_at);

        // Determine total duration in seconds based on tariff
        switch(strtolower($assignment->tarriff)) {
            case 'annual':
                $totalSeconds = 365 * 24 * 60 * 60;
                break;
            case 'quarterly':
                $totalSeconds = 90 * 24 * 60 * 60;
                break;
            case 'monthly':
                $totalSeconds = 30 * 24 * 60 * 60;
                break;
            default:
                $totalSeconds = 0;
        }

        // Calculate the target end time
        $assignment->end_time = $created->addSeconds($totalSeconds)->timestamp; // Unix timestamp

        return $assignment;
    });

    $tariff = tarriff::where('status', 'active')->get();

    return view('dash.Quotation', compact('customers', 'devices', 'CustomerAll','tariff'));
}




    // Store assignment
    public function store(Request $request)
{
    try {
        //  Validate input
        $validated = $request->validate([
            'customer_email' => 'required|exists:customers,email|unique:customer_device_assignments,customer_email',
            'device_imei'    => 'required|exists:uploads,imei|unique:customer_device_assignments,device_imei',
            'tarriff' => 'required|string',
        ]);

        //  Create assignment
        CustomerDeviceAssignment::create($validated);

        //  Update customer status
        Customers::where('email', $validated['customer_email'])
            ->update(['status' => 'active']);

        //  Update device status
        Upload::where('imei', $validated['device_imei'])
            ->update(['status' => 'inactive']);

        //  Success notification
        return redirect()->back()->with('success', 'Device assigned successfully!');

    } catch (\Illuminate\Validation\ValidationException $e) {
        // Return validation errors as notifications
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        // Generic error notification
        return redirect()->back()->with('error', 'Failed to assign device: ' . $e->getMessage());
    }
}


}
