<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use App\Models\Upload;
use App\Models\CustomerDeviceAssignment;
use Illuminate\Http\Request;

class CustomerDeviceAssignmentController extends Controller
{
    // Show assignment form
public function create()
{
    $user = auth()->user(); // currently logged-in user

    if ($user->role === 'admin') {
        // Admin sees all pending customers
        $customers = Customers::where('status', 'pending')->get();
    } else {
        // Regular users see only their own pending customers
        $customers = Customers::where('status', 'pending')
                              ->where('user_id', $user->id)
                              ->get();
    }

    // Only fetch active devices
    $devices = Upload::where('status', 'active')->get();

    // Existing assignments
    $CustomerAll = CustomerDeviceAssignment::all();

    // Pass full customer details to the view
    return view('dash.Quotation', compact('customers', 'devices', 'CustomerAll'));
}




    // Store assignment
    public function store(Request $request)
{
    try {
        // 1️⃣ Validate input
        $validated = $request->validate([
            'customer_email' => 'required|exists:customers,email|unique:customer_device_assignments,customer_email',
            'device_imei'    => 'required|exists:uploads,imei|unique:customer_device_assignments,device_imei',
        ]);

        // 2️⃣ Create assignment
        CustomerDeviceAssignment::create($validated);

        // 3️⃣ Update customer status
        Customers::where('email', $validated['customer_email'])
            ->update(['status' => 'active']);

        // 4️⃣ Update device status
        Upload::where('imei', $validated['device_imei'])
            ->update(['status' => 'inactive']);

        // ✅ Success notification
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
