<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class CommercialInfoController extends Controller
{
    public function show(): JsonResponse
    {
        return response()->json(['message' => 'ok']);
    }
}
