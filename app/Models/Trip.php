<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    protected $fillable = [
        'tid',
        'vid',
        'nickname',
        'plate_number',
        'trip_start',
        'trip_end',
        'driver_id',
        'driver_name',
        'odometer_start',
        'odometer_end',
        'trip_type',
        'fuel_usage',
        'fuel_idle',
        'start_longitude',
        'start_latitude',
        'start_address',
        'end_longitude',
        'end_latitude',
        'end_address',
        'poi',
        'avg_speed',
    ];
}
