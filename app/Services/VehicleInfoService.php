<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class VehicleInfoService
{
    /**
     * Obtiene la información de un vehículo desde el sitio externo.
     */
    public function fetchVehicleInfo(string $plate): array
    {
        $url = 'https://www.ecuadorlegalonline.com/modulo/sri/matriculacion/consultar-vehiculo-rubros.php';

        $response = Http::withHeaders([
            'Accept' => '*/*',
            'Accept-Language' => 'es-ES,es;q=0.9,en;q=0.8',
            'Accept-Encoding' => 'gzip, deflate, br, zstd',
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36',
            'X-Requested-With' => 'XMLHttpRequest',
            'Referer' => 'https://www.ecuadorlegalonline.com/consultas/agencia-nacional-de-transito/consultar-a-quien-pertenece-un-vehiculo-por-placa-ant/',
        ])->get($url, ['placa' => $plate]);

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('Error al obtener información del vehículo');
    }
}
