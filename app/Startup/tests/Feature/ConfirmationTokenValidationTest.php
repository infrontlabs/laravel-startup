<?php

namespace Tests\Feature;

use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Cashier\Subscription;
use Tests\TestCase;

class ConfirmationTokenValidationTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @test
     */
    public function user_has_valid_confirmation_token()
    {
        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $token = $user->createConfirmationToken();

        $response = $this->actingAs($user)->get(route('auth.email.confirmation', $token));

        $this->assertEquals($response->getStatusCode(), 302);

        $response->assertSessionHas('success', __('auth.email_confirmation_success'));

        $response->assertRedirect(route('login'));

    }

    /**
     * @test
     */
    public function confirmation_token_has_not_expired()
    {
        $user = factory(User::class)->create();

        $token = $user->createConfirmationToken();

        $user->confirmationToken->expires_at = Carbon::now()->subDay();
        $user->confirmationToken->save();

        $response = $this->actingAs($user)->get(route('auth.email.confirmation', $token));

        $this->assertEquals($response->getStatusCode(), 302);

        $response->assertSessionHas('error', __('auth.email_confirmation_error'));

        $response->assertRedirect(route('login'));
    }

    /**
     * @test
     */
    public function prevent_access_to_dashboard_app_if_email_has_not_been_confirmed()
    {
        $owner = factory(User::class)->create([
            'email_confirmed' => false,
        ]);
        $account = $owner->createAccount(['name' => 'Test Account']);
        $owner->setCurrentAccount($account);

        factory(Subscription::class)->create([
            'account_id' => $account->id,
            'stripe_plan' => 'plan-1',
            'stripe_id' => 'sub_test1234',
        ]);

        $response = $this->actingAs($owner)->get(route('app.dashboard'));

        $this->assertEquals($response->getStatusCode(), 302);
        $response->assertSessionHas('error', __('auth.email_app_restriction'));

        $response->assertRedirect(route('account.index'));

    }

    /**
     * @test
     */
    public function allow_access_to_dashboard_app_if_email_has_been_confirmed()
    {
        $owner = factory(User::class)->create([
            'email_confirmed' => true,
        ]);
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
