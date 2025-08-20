<?php

namespace App\Http\Controllers;

use App\Models\tarriff;
use Illuminate\Http\Request;
use Carbon\Carbon;

class tarriffController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'device_type'   => 'required|string',
            'billing_cycle' => 'required|string',
            'amount'        => 'required|string',
            'tax'           => 'required|integer',
            'status'   => 'required|string|in:Active,Pending Approval',
            'description'   => 'nullable|string',
        ]);

        tarriff::create($validated);

        return redirect()->back()->with('success', 'Tariff added successfully!');
    }

    public function showtarriff()
{
    $tarriffs = tarriff::all();
    $totaltarriffs = $tarriffs->count();

    $activeCount = tarriff::where('status', 'Active')->count();

    $now = Carbon::now();
    $newCount = tarriff::whereYear('created_at', $now->year)
    ->whereMonth('created_at', $now->month)
    ->count();

    return view('dash.tarriff', compact('tarriffs','newCount','activeCount' ));
}



public function updatetarriff(Request $request, $id)
{
    $tarriffs = tarriff::findOrFail($id);

    $validated = $request->validate([
        'name'          => 'required|string|max:255',
        'device_type'   => 'required|string',
        'billing_cycle' => 'required|string',
        'amount'        => 'required|string',
        'tax'           => 'required|integer',
        'status'        => 'required|string|in:Active,Pending Approval',
        'description'   => 'nullable|string',
    ]);

    $tarriffs->update($validated);

return redirect()->route('dash.tarriff.index')
    ->with('success', 'Tariff updated successfully!');


}


    public function destroytarriff(Request $request, $id)
    {
        $tarriffs = tarriff::findOrFail($id);
        $tarriffs->delete();


        return redirect()->route('dash.tarriff.index')
            ->with('success', 'Tarriff has been deleted.');
    }
}
