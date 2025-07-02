<?php

namespace App\Http\Controllers;

use App\Services\VehicleInfoService;
use Illuminate\Http\JsonResponse;

class VehicleInfoController extends Controller
{
    public function __construct(private VehicleInfoService $service)
    {
    }

    /**
     * Devuelve la información del vehículo en formato JSON.
     */
    public function show(string $plate): JsonResponse
    {
        $info = $this->service->fetchVehicleInfo($plate);

        return response()->json($info);
    }
}
