<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UrlShortTest extends TestCase
{
    /**
     * A basic feature test
     *
     * @test
     */
    public function test_visitor_visite_theis_url_route()
    {
        $response = $this->get(route('url-short'));

        $response->assertStatus(200);
    }
}
