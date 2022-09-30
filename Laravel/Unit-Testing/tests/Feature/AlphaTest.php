<?php

namespace Tests\Feature;

use Tests\TestCase;

class AlphaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample(): void
    {
        $response = $this->get('/alpha');

        $response->assertStatus(200);
        $response->assertSee('Alpha');
        $response->assertDontSee('Beta');
    }
}
