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
    public function test_api_session_response()
    {
        $response = $this->withoutExceptionHandling()->get('/test/session/');
        $response->assertStatus(200);

        $response = $this->get('/test/session/asd');
        $response->assertStatus(404);
    }
}
