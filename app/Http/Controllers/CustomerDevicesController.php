<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class CustomerDevicesController extends Controller
{
    public function CustomService()
    {
        $CustomService = Service::all();

        return response()->json([
            'CustomService' => $CustomService
        ]);
    }
}
