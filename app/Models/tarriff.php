<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tarriff extends Model
{
    
protected $fillable = [
    'name','device_type','billing_cycle','amount','tax','status','description'
];
}
