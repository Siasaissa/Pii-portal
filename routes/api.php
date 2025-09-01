<?php

use App\Http\Controllers\CustomerDevicesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Authentication\UserController;

Route::get('/users', function () {
    return response()->json(['users' => []]);
});

// routes/api.php
Route::middleware('api-with-session')->post('/login', [UserController::class, 'apiLogin']);


Route::get('/service', [CustomerDevicesController::class, 'CustomService']);


// routes/api.php
Route::middleware('api-with-session')->post('/logoutC', [UserController::class, 'logoutC']);





