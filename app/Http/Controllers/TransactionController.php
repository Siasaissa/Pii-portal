<?php

namespace App\Http\Controllers;
use App\Models\Customers;
use Carbon\Carbon;

use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function showCustomer()
{
    $customers = Customers::all();
    $totalCustomers = $customers->count();

    $activeCount = Customers::where('status', 'Active')->count();

    $now = Carbon::now();
    $newCount = Customers::whereYear('created_at', $now->year)
    ->whereMonth('created_at', $now->month)
    ->count();

    return view('dash.Transaction', compact('customers', 'totalCustomers', 'activeCount','newCount'));
}
}
