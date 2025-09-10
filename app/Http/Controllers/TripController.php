<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Trip;

class TripController extends Controller
{
    public function syncTrips(Request $request)
    {
        $url = "https://www.worldfleetlog.com/WebFleetStationServices/ManagedServices.asmx";

        // Get last TID we saved
        $lastTid = Trip::max('tid') ?? 0;

        $xmlBody = '<?xml version="1.0" encoding="utf-8"?>
        <soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
          <soap:Header>
            <LoginInfo xmlns="http://tempuri.org/">
              <Username>humtech</Username>
              <Password>Blue@255!</Password>
              <Company>PII Test</Company>
            </LoginInfo>
          </soap:Header>
          <soap:Body>
            <GetNextTripsRecords xmlns="http://tempuri.org/">
              <LastRecordID>' . $lastTid . '</LastRecordID>
              <MaxRecords>1000</MaxRecords>
              <DeviceID></DeviceID>
              <StartDate>2010-01-01T00:00:00</StartDate>
            </GetNextTripsRecords>
          </soap:Body>
        </soap:Envelope>';

        $response = Http::withHeaders([
            'Content-Type' => 'text/xml; charset=utf-8',
            'SOAPAction'   => '"http://tempuri.org/GetNextTripsRecords"',
        ])->withBody($xmlBody, 'text/xml')->post($url);

        if ($response->failed()) {
            return response()->json(['error' => 'Request failed'], 500);
        }

        // Extract SOAP body
        $xml = simplexml_load_string($response->body());
        $ns = $xml->children('soap', true)->Body
            ->children('http://tempuri.org/')
            ->GetNextTripsRecordsResponse
            ->GetNextTripsRecordsResult;

        $tripsXml = html_entity_decode((string)$ns);

        $trips = simplexml_load_string($tripsXml);
        $json = json_decode(json_encode($trips), true);

        $count = 0;
        if (isset($json['T'])) {
            foreach ($json['T'] as $trip) {
                Trip::updateOrCreate(
                    ['tid' => $trip['TID'] ?? null],
                    [
                        'vid'             => $trip['VID'] ?? null,
                        'nickname'        => $trip['NN'] ?? null,
                        'plate_number'    => $trip['PN'] ?? null,
                        'trip_start'      => $trip['T1'] ?? null,
                        'trip_end'        => $trip['T2'] ?? null,
                        'driver_id'       => $trip['DID'] ?? null,
                        'driver_name'     => $trip['DN'] ?? null,
                        'odometer_start'  => $trip['O1'] ?? null,
                        'odometer_end'    => $trip['O2'] ?? null,
                        'trip_type'       => $trip['TT'] ?? null,
                        'fuel_usage'      => $trip['FUS'] ?? null,
                        'fuel_idle'       => $trip['FID'] ?? null,
                        'start_longitude' => $trip['X1'] ?? null,
                        'start_latitude'  => $trip['Y1'] ?? null,
                        'start_address'   => $trip['AD1'] ?? null,
                        'end_longitude'   => $trip['X2'] ?? null,
                        'end_latitude'    => $trip['Y2'] ?? null,
                        'end_address'     => $trip['AD2'] ?? null,
                        'poi'             => $trip['PD'] ?? null,
                        'avg_speed'       => $trip['AGS'] ?? null,
                    ]
                );
                $count++;
            }
        }

        return redirect()->route('dash.tracker')
            ->with('success', "$count trips synced successfully!");
    }

    public function index()
{
    $trips = Trip::all(); // paginate for performance
    return view('dash.tracker', compact('trips'));
}
public function store(Request $request)
{
    $validated = $request->validate([
        'tid'             => 'required|numeric|unique:trips,tid',
        'vid'             => 'required|string|max:255',
        'nickname'        => 'nullable|string|max:255',
        'plate_number'    => 'nullable|string|max:50',
        'driver_id'       => 'nullable|string|max:50',
        'driver_name'     => 'nullable|string|max:255',
        'trip_start'      => 'nullable|date',
        'trip_end'        => 'nullable|date',
        'odometer_start'  => 'nullable|numeric',
        'odometer_end'    => 'nullable|numeric',
        'trip_type'       => 'nullable|string|max:50',
        'fuel_usage'      => 'nullable|numeric',
        'fuel_idle'       => 'nullable|numeric',
        'start_longitude' => 'nullable|string|max:50',
        'start_latitude'  => 'nullable|string|max:50',
        'start_address'   => 'nullable|string|max:255',
        'end_longitude'   => 'nullable|string|max:50',
        'end_latitude'    => 'nullable|string|max:50',
        'end_address'     => 'nullable|string|max:255',
        'poi'             => 'nullable|string|max:255',
        'avg_speed'       => 'nullable|numeric',
    ]);

    // Convert lat/long to float for DB consistency
    if (isset($validated['start_latitude'])) {
        $validated['start_latitude'] = floatval($validated['start_latitude']);
    }
    if (isset($validated['start_longitude'])) {
        $validated['start_longitude'] = floatval($validated['start_longitude']);
    }
    if (isset($validated['end_latitude'])) {
        $validated['end_latitude'] = floatval($validated['end_latitude']);
    }
    if (isset($validated['end_longitude'])) {
        $validated['end_longitude'] = floatval($validated['end_longitude']);
    }

    Trip::create($validated);

    return redirect()->route('dash.trips')
                     ->with('success', 'Trip added successfully!');
}

public function view()
{
    $user = auth()->user();

    $query = Upload::where('status', 'active');

    if ($user->role === 'admin') {
        $query->whereNull('user_id'); // only unassigned uploads
    } else {
        $query->where('user_id', $user->id); // only uploads assigned to this user
    }

    $unassigned = $query->get();

    return view('dash.UnAssigned', compact('unassigned'));
}




}
