<?php

namespace Tests\Feature;

use Tests\TestCase;

class BetaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example(): void
    {
        $response = $this->get('/beta');

        $response->assertStatus(200);

        $response->assertSee('Beta');
        $response->assertDontSee('Alpha');
    }
}
