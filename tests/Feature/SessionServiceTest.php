<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Request;
use Mockery\Mock;
use Tests\TestCase;

class SessionServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_web_session_get(): void
    {
        $response = $this->withoutExceptionHandling()->get('/test/session/');
        $response->assertStatus(200);

        $response = $this->get('/test/session/asd');
        $response->assertStatus(200);
    }

    public function test_web_session_post(): void
    {
        $response = $this->post('/test/session/', [
            'name' => 'session1',
            'data' => 'dataSession'
        ]);
        $response->assertStatus(200);
    }

    public function test_web_set_session(): void
    {
        $response = $this->post('/test/session/', [
            'name' => 'session1',
            'data' => 'dataSession'
        ]);
        $response
            ->assertSessionHas('session1')
            ->assertContent('"dataSession"')
        ;
    }
}
