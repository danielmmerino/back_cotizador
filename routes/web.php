<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\VehicleInfoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/api/login', [AuthController::class, 'login']);

Route::middleware('jwt')->get('/api/vehicle-info/{plate}', [VehicleInfoController::class, 'show']);
