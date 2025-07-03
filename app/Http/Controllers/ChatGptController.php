<?php

namespace App\Http\Controllers;

use App\Services\ChatGptService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChatGptController extends Controller
{
    public function __construct(private ChatGptService $service)
    {
    }

    public function handle(Request $request): JsonResponse
    {
        $data = $request->validate([
            'mensaje' => 'required|string',
        ]);

        $respuesta = $this->service->generateResponse($data['mensaje']);

        return response()->json(['respuesta' => $respuesta]);
    }
}
