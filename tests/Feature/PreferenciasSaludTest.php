<?php

namespace Tests\Feature;

use Tests\TestCase;

class PreferenciasSaludTest extends TestCase
{
    public function test_opciones_preferencias_salud_endpoint_returns_data(): void
    {
        $expected = json_decode(file_get_contents(base_path('preferencias_salud.json')), true);

        $response = $this->get('/api/opciones_preferencias_salud');

        $response->assertStatus(200)
                 ->assertExactJson($expected);
    }
}
