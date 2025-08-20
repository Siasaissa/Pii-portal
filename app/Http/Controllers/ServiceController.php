<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ServiceController extends Controller
{
    public function addService(Request $request)
    {
        
        // Validate the incoming request
        $validated = $request->validate([
            'service_name'     => 'required|string|max:255',
            'description'    => 'required|string|max:255',
            'price'    => 'required|string|max:255',
            'billing_cycle'  => 'required|string|max:50|in:monthly,annual',


        ]);


        // Create the service
        Service::create([

            'service_name' =>$validated['service_name'],
            'description' =>$validated['description'],
            'price' =>$validated['price'],
            'billing_cycle' =>$validated['billing_cycle'],

        ]);

        // Redirect back with success message
        return redirect()->route('dash.Services')
            ->with('success', 'New service added successfully!');
    }

public function showService()
{
    $services = Service::all();

    $totalService = $services->count();
    $activeCount = Service::where('status', 'active')->count();
    $inactiveCount = $totalService - $activeCount;

    $now = Carbon::now();
    $newCount = Service::whereYear('created_at', $now->year)
        ->whereMonth('created_at', $now->month)
        ->count();

    return view('dash.services', compact('services', 'totalService', 'activeCount','inactiveCount'));
}


public function updateStatus(Request $request, $id)
{
    $service = Service::findOrFail($id);

    $request->validate([
        'status' => 'required|in:active,inactive' 
    ]);

    $service->status = $request->status;
    $service->save();

    return response()->json([
        'success' => true,
        'status'  => $service->status
    ]);
}




   public function updateServices(Request $request, $id)
{
    $service = Service::findOrFail($id);

    $validated = $request->validate([
            'service_name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'billing_cycle'=> 'required|string|max:50|in:monthly,annual,' . $id,
    ]);

    $service->update($validated);



    return redirect()->route('dash.Services')
        ->with('success', 'Services information updated successfully!');
}


    public function destroyService(Request $request, $id)
    {
        $Services = Service::findOrFail($id);
        $Services->delete();


        return redirect()->route('dash.Services')
        ->with('success', 'Service Deleted successfully!');
    }

}
