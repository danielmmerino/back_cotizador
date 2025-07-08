<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\VehicleInfoController;
use App\Http\Controllers\ChatGptController;
use App\Http\Controllers\CommercialInfoController;
use App\Http\Controllers\PreferenciasSaludController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/api/login', [AuthController::class, 'login'])
    ->withoutMiddleware([
        Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class,
    ]);

Route::middleware('jwt')->get('/api/vehicle-info/{plate}', [VehicleInfoController::class, 'show']);

Route::post('/api/conexion_chatgpt', [ChatGptController::class, 'handle'])
    ->withoutMiddleware([
        Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class,
    ]);

Route::get('/api/comercial-info', [CommercialInfoController::class, 'show'])
    ->withoutMiddleware([
        Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class,
    ]);

Route::get('/api/opciones_preferencias_salud', [PreferenciasSaludController::class, 'index'])
    ->withoutMiddleware([
        Illuminate\Foundation\Http\Middleware\VerifyCsrfToken::class,
    ]);
