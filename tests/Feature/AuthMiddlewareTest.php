<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function login_page_redirects_to_dashboard_if_already_authenticated()
    {
        $owner = factory(User::class)->create();

        $response = $this->actingAs($owner)->get(route('login'));

        $this->assertEquals($response->getStatusCode(), 302);
    }

    /**
     * @test
     */
    public function register_page_redirects_to_dashboard_if_already_authenticated()
    {
        $owner = factory(User::class)->create();

        $response = $this->actingAs($owner)->get(route('register'));

        $this->assertEquals($response->getStatusCode(), 302);
    }
}
