<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\Vehicle;
use App\Models\Service;

class DashboardController extends Controller
{
public function index(Request $request)
{
    $vehicles = Vehicle::all();
    $total = Vehicle::count();

    // detect which route was used
    if ($request->routeIs('dash.dashboard')) {
        return view('dash.dashboard', compact('vehicles', 'total'));
    }

    return view('dash.index', compact('vehicles', 'total'));
}


public function totalCustomers()
{
    $totalCustomer = Customers::count(); 
    $totalService = Service::count();
    $totalCustomer = Customers::count();

    // Get latest 5 updated customers
    //$customers = Customers::latest()->get(4);
    $customers = Customers::orderBy('updated_at', 'desc')->take(6)->get();


    return view('dash.index', compact('totalCustomer','totalService', 'customers'));
}



}
