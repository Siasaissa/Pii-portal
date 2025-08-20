<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class VehicleController extends Controller
{
   public function getCars()
{
    $url = "https://www.worldfleetlog.com/WebFleetStationServices/Online.asmx";

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
        <GetCarsInfoNew xmlns="http://tempuri.org/">
          <DeviceID></DeviceID>
        </GetCarsInfoNew>
      </soap:Body>
    </soap:Envelope>';

    $response = Http::withHeaders([
        'Content-Type' => 'text/xml; charset=utf-8',
        'SOAPAction'   => '"http://tempuri.org/GetCarsInfoNew"',
    ])->withBody($xmlBody, 'text/xml')->post($url);

    if ($response->failed()) {
        return response()->json(['error' => 'Request failed'], 500);
    }

    // Extract SOAP body
    $xml = simplexml_load_string($response->body());
    $ns = $xml->children('soap', true)->Body
        ->children('http://tempuri.org/')
        ->GetCarsInfoNewResponse
        ->GetCarsInfoNewResult;

    $vehiclesXml = html_entity_decode((string)$ns);

    $vehicles = simplexml_load_string($vehiclesXml);
    $json = json_decode(json_encode($vehicles), true);

    if (isset($json['V'])) {
        foreach ($json['V'] as $car) {
            Vehicle::updateOrCreate(
                ['device_id' => $car['DV'] ?? null], // unique key
                [
                    'nickname'       => $car['NN'] ?? null,
                    'plate_number'   => $car['PN'] ?? null,
                    'driver_name'    => $car['DN'] ?? null,
                    'trip_type'      => $car['TT'] ?? null,
                    'event_name'     => $car['EN'] ?? null,
                    'event_time'     => $car['ET'] ?? null,
                    'region'         => $car['RG'] ?? null,
                    'speed'          => $car['SP'] ?? null,
                    'odometer'       => $car['OD'] ?? null,
                    'fuel_level'     => $car['FP'] ?? null,
                    'vehicle_state'  => $car['VS'] ?? null,
                    'longitude'      => $car['X'] ?? null,
                    'latitude'       => $car['Y'] ?? null,
                ]
            );
        }
    }

   // return response()->json([
    //    'message' => 'Vehicles saved successfully',
    //    'count'   => count($json['V'] ?? []),
   // ]);
return redirect()->route('dash.trackers')
    ->with('success', 'Device information synced successfully!');

}

public function index()
{
    $vehicles = Vehicle::all();
    $total= Vehicle::count();

    return view('dash.Tracker', compact('vehicles','total'));
}


 public function store(Request $request)
    {
        $validated = $request->validate([
            'device_id'        => 'required|string|unique:vehicles,device_id',
            'nickname'         => 'nullable|string|max:255',
            'plate_number'     => 'nullable|string|max:50',
            'driver_id'        => 'nullable|string|max:50',
            'driver_name'      => 'nullable|string|max:255',
            'trip_type'        => 'nullable|string|max:50',
            'event_code'       => 'nullable|string|max:50',
            'event_name'       => 'nullable|string|max:255',
            'event_info'       => 'nullable|string|max:500',
            'event_time'       => 'nullable|date',
            'speed'            => 'nullable|numeric',
            'odometer'         => 'nullable|numeric',
            'engine_hours'     => 'nullable|numeric',
            'fuel_level'       => 'nullable|numeric',
            'battery_level'    => 'nullable|numeric',
            'latitude'         => 'nullable|string|max:50',
            'longitude'        => 'nullable|string|max:50',
            'idle_duration'    => 'nullable|numeric',
            'parking_duration' => 'nullable|numeric',
            'trip_duration'    => 'nullable|numeric',
        ]);

        // Convert lat/long to float to avoid SQL overflow
        if (isset($validated['latitude'])) {
            $validated['latitude'] = floatval($validated['latitude']);
        }
        if (isset($validated['longitude'])) {
            $validated['longitude'] = floatval($validated['longitude']);
        }

        Vehicle::create($validated);

        return redirect()->route('dash.trackers')
                         ->with('success', 'Tracker added successfully!');
    }



}