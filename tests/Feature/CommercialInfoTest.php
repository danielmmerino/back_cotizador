<?php

namespace Tests\Feature;

use Tests\TestCase;

class CommercialInfoTest extends TestCase
{
    public function test_commercial_info_endpoint_returns_ok(): void
    {
        $response = $this->get('/api/comercial-info');

        $response->assertStatus(200)
                 ->assertJson(['message' => 'ok']);
    }
}
