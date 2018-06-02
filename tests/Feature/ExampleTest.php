<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {

        dd(env('DB_CONNECTION'), env('DB_DATABASE'));

        Passport::actingAs(
            factory(User::class)->make([
                'email' => 'john@test.com',
            ])
        );

        $response = $this->get('/api/user');

        $response
            ->assertStatus(200)
            ->assertJson([
                'email' => 'john@test.com',
            ]);
    }
}
