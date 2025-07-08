<?php

namespace Tests\Feature;

use Tests\TestCase;

class CotizarSaludPorPreferenciasTest extends TestCase
{
    public function test_cotizar_salud_por_preferencias_endpoint_returns_data(): void
    {
        $payload = [
            'preferencias' => [
                ['id' => '1', 'orden' => '1'],
                ['id' => '3', 'orden' => '2'],
                ['id' => '2', 'orden' => '3'],
            ],
            'parametros' => [
                'edad' => '25',
                'genero' => 'F',
            ],
        ];

        $expected = json_decode(file_get_contents(base_path('cotizador_salud.json')), true);

        $response = $this->postJson('/api/cotizar_salud_por_preferencias', $payload);

        $response->assertStatus(200)
                 ->assertExactJson($expected);
    }
}
