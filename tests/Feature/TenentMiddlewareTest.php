<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TenentMiddlewareTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @test
     */
    public function middleware_redirects_non_authenticated_users()
    {
        $response = $this->get(route('account.index'));

        $this->assertEquals($response->getStatusCode(), 302);
    }

    /**
     * @test
     */
    public function middleware_redirects_users_without_accounts()
    {
        // $this->withoutExceptionHandling();

        $owner = factory(User::class)->create();

        $response = $this->actingAs($owner)->get(route('account.index'));

        $this->assertEquals($response->getStatusCode(), 302);
    }

    /**
     * @test
     */
    public function middleware_sets_default_current_account_if_not_set()
    {
        // $this->withoutExceptionHandling();

        $owner = factory(User::class)->create();
        $account = $owner->createAccount(['name' => 'Test Account']);
        $owner->setCurrentAccount(null);

        $response = $this->actingAs($owner)->get(route('account.index'));

        $this->assertEquals($owner->current_account_id, $account->id);
    }

    /**
     * @test
     */
    public function middleware_allows_authorized_account_holders()
    {
        // $this->withoutExceptionHandling();

        $owner = factory(User::class)->create();
        $account = $owner->createAccount(['name' => 'Test Account']);
        $owner->setCurrentAccount($account);

        $response = $this->actingAs($owner)->get(route('account.index'));

        $this->assertEquals($response->getStatusCode(), 200);

    }

    /**
     * @test
     */
    public function middleware_allows_invited_users_to_access_account()
    {
        $owner = factory(User::class)->create();
        $account = $owner->createAccount(['name' => 'Test Account']);

        $invitedUser = factory(User::class)->create();
        $account->addMember($invitedUser, ['role' => 'testrole']);
        $invitedUser->setCurrentAccount($account);

        $response = $this->actingAs($invitedUser)->get(route('account.index'));

        $this->assertEquals($response->getStatusCode(), 200);

    }
}
