<?php

namespace Tests\Feature;

use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ConfirmationTokenValidationTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @test
     */
    public function user_has_valid_confirmation_token()
    {
        $user = factory(User::class)->create();

        $token = $user->createConfirmationToken();

        $response = $this->actingAs($user)->get(route('auth.email.confirmation', $token));

        $this->assertEquals($response->getStatusCode(), 302);

        $response->assertSessionHas('success', __('auth.email_confirmation_success'));
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

        $response->assertRedirect(route('account.index'));
    }
}
