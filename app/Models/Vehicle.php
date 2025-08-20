<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'device_id', 'nickname', 'plate_number', 'driver_id', 'driver_name',
        'trip_type', 'event_code', 'event_name', 'event_info', 'event_time',
        'speed', 'odometer', 'engine_hours', 'fuel_level', 'battery_level',
        'latitude', 'longitude', 'idle_duration', 'parking_duration', 'trip_duration'
    ];
}

