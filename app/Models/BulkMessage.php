<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BulkMessage extends Model
{
    protected $fillable = ['name', 'email', 'message'];

}
