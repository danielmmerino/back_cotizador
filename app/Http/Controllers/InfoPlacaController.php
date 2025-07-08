<?php

namespace App\Http\Controllers;

use App\Services\VehicleInfoService;
use App\Services\PreciosAutosService;
use Illuminate\Http\JsonResponse;

class InfoPlacaController extends Controller
{
    public function __construct(private VehicleInfoService $vehicleService, private PreciosAutosService $preciosService)
    {
    }

    public function show(string $plate): JsonResponse
    {
        $info = $this->vehicleService->fetchVehicleInfo($plate);
        $vehiculo = $info['vehiculo'] ?? [];

        $opciones = [];
        if ($vehiculo) {
            $opciones = $this->preciosService->search(
                $vehiculo['descripcionMarca'] ?? '',
                $vehiculo['descripcionModelo'] ?? '',
                $vehiculo['anioAuto'] ?? ''
            );
        }

        $result = [
            'vehiculo' => [
                'codigoVehiculo' => $vehiculo['codigoVehiculo'] ?? null,
                'numeroPlaca' => $vehiculo['numeroPlaca'] ?? null,
                'descripcionMarca' => $vehiculo['descripcionMarca'] ?? null,
                'descripcionModelo' => $vehiculo['descripcionModelo'] ?? null,
                'anioAuto' => $vehiculo['anioAuto'] ?? null,
                'descripcionPais' => $vehiculo['descripcionPais'] ?? null,
                'opcionesComerciales' => $opciones,
            ],
        ];

        return response()->json($result);
    }
}
