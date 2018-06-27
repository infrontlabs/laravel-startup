<?php

namespace Tests\Feature;

use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Cashier\Subscription;
use Tests\TestCase;

class AccountSubscriptionMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function middleware_does_not_allow_team_page_if_inactive_subscription()
    {
        $owner = factory(User::class)->create();
        $account = $owner->createAccount(['name' => 'Test Account']);
        $owner->setCurrentAccount($account);

        $response = $this->actingAs($owner)->get(route('account.team'));

        $this->assertEquals($response->getStatusCode(), 302);

    }

    /**
     * @test
     */
    public function middleware_allows_team_page_if_active_subscription()
    {
        $owner = factory(User::class)->create();
        $account = $owner->createAccount(['name' => 'Test Account']);
        $owner->setCurrentAccount($account);

        factory(Subscription::class)->create([
            'account_id' => $account->id,
            'stripe_plan' => 'plan-1',
            'stripe_id' => 'sub_test1234',
        ]);

        $response = $this->actingAs($owner)->get(route('account.team'));

        $this->assertEquals($response->getStatusCode(), 200);

    }

    /**
     * @test
     */
    public function middleware_prevents_dashboard_access_without_subscription()
    {
        $owner = factory(User::class)->create();
        $account = $owner->createAccount(['name' => 'Test Account']);
        $owner->setCurrentAccount($account);

        $response = $this->actingAs($owner)->get(route('app.dashboard'));

        $this->assertEquals($response->getStatusCode(), 302);
    }

    /**
     * @test
     */
    public function middleware_prevents_dashboard_access_without_canceled_subscription()
    {
        $owner = factory(User::class)->create();
        $account = $owner->createAccount(['name' => 'Test Account']);
        $owner->setCurrentAccount($account);

        $subscription = factory(Subscription::class)->create([
            'account_id' => $account->id,
            'stripe_plan' => 'plan-1',
            'stripe_id' => 'sub_test1234',
        ]);

        // simulate canceling a subscription without making an API call to stripe.
        $subscription->ends_at = Carbon::now();
        $subscription->trial_ends_at = Carbon::now();
        $subscription->save();

        $response = $this->actingAs($owner)->get(route('app.dashboard'));

        $this->assertEquals($response->getStatusCode(), 302);
    }

    /**
     * @test
     */
    public function middleware_allows_dashboard_access_with_subscription()
    {
        $owner = factory(User::class)->create();
        $account = $owner->createAccount(['name' => 'Test Account']);
        $owner->setCurrentAccount($account);

        factory(Subscription::class)->create([
            'account_id' => $account->id,
            'stripe_plan' => 'plan-1',
            'stripe_id' => 'sub_test1234',
        ]);

        $response = $this->actingAs($owner)->get(route('app.dashboard'));

        $this->assertEquals($response->getStatusCode(), 200);

    }

}
