<?php

namespace App\Services;

use SoapClient;
use SimpleXMLElement;
use App\Models\Vehicle;

class FleetService
{
    protected $client;

    public function __construct()
    {
        $wsdl = "https://www.worldfleetlog.com/WebFleetStationServices/Online.asmx?WSDL";
        $this->client = new SoapClient($wsdl);
    }

    public function authenticate($username, $password, $company)
    {
        return $this->client->Authenticate($username, $password, $company);
    }

    public function getVehicles()
    {
        $responseXml = $this->client->GetCarsInfoNew("");
        $xml = new SimpleXMLElement($responseXml);

        $vehicles = [];

        foreach ($xml->V as $v) {
            $vehicles[] = [
                'device_id' => (string)$v->DV,
                'nickname' => (string)$v->NN,
                'plate_number' => (string)$v->PN,
                'driver_id' => (string)$v->DR,
                'driver_name' => (string)$v->DN,
                'trip_type' => (string)$v->TT,
                'event_code' => (string)$v->EC,
                'event_name' => (string)$v->EN,
                'event_info' => (string)$v->EI,
                'event_time' => isset($v->ET) ? date('Y-m-d H:i:s', strtotime((string)$v->ET)) : null,
                'speed' => (float)$v->SP,
                'odometer' => (float)$v->OD,
                'engine_hours' => (float)$v->EH,
                'fuel_level' => (float)$v->FP,
                'battery_level' => (float)$v->BL,
                'latitude' => (float)$v->Y,
                'longitude' => (float)$v->X,
                'idle_duration' => (int)$v->IDS,
                'parking_duration' => (int)$v->PDS,
                'trip_duration' => (int)$v->TDS,
            ];
        }

        return $vehicles;
    }

    public function syncVehicles($username, $password, $company)
    {
        if (!$this->authenticate($username, $password, $company)) {
            return false;
        }

        $vehicles = $this->getVehicles();

        foreach ($vehicles as $v) {
            Vehicle::updateOrCreate(
                ['device_id' => $v['device_id']],
                $v
            );
        }

        return true;
    }
}
