<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerDeviceAssignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_email',
        'device_imei',
    ];

    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customer_email', 'email');
    }

    public function device()
    {
        return $this->belongsTo(Upload::class, 'device_imei', 'imei');
    }
}
