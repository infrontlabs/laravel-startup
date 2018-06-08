<?php

namespace Tests\Feature;

use App\Org;
// use Illuminate\Foundation\Testing\WithFaker;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OrganizationsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function user_belongs_to_organizations()
    {
        $user = factory(User::class)->make([
            'id' => 12345,
        ]);

        $user->orgs()->save(factory(Org::class)->make());
        $user->orgs()->save(factory(Org::class)->make());

        $this->assertEquals($user->orgs()->count(), 2);
    }
}
