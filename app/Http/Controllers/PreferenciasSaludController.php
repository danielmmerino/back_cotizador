<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class PreferenciasSaludController extends Controller
{
    public function index(): JsonResponse
    {
        $path = base_path('preferencias_salud.json');
        $data = json_decode(file_get_contents($path), true);

        return response()->json($data);
    }
}
