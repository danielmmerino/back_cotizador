<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ChatGptService
{
    public function generateResponse(string $mensaje): string
    {
        $response = Http::withToken(config('services.openai.key'))
            ->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'user', 'content' => $mensaje],
                ],
            ]);

        if ($response->successful()) {
            return $response->json('choices.0.message.content');
        }

        throw new \Exception('Error comunicando con ChatGPT');
    }
}
