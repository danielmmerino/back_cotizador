<?php

use App\Http\Controllers\VehicleInfoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/vehicle-info/{plate}', [VehicleInfoController::class, 'show']);
