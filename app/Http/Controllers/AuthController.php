<?php

namespace App\Http\Controllers;

use App\Services\JwtService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $apiKey = $request->header('x-api-key');

        if ($apiKey !== config('app.api_key')) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $payload = [
            'iss' => config('app.url'),
            'iat' => time(),
            'exp' => time() + 3600,
        ];

        $token = JwtService::encode($payload, config('app.jwt_secret'));

        return response()->json(['token' => $token]);
    }
}
