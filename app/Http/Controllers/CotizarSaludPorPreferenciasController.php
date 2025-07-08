<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CotizarSaludPorPreferenciasController extends Controller
{
    public function handle(Request $request): JsonResponse
    {
        $path = base_path('cotizador_salud.json');
        $data = json_decode(file_get_contents($path), true);

        return response()->json($data);
    }
}
