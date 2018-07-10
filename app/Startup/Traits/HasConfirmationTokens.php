<?php

namespace Startup\Traits;

use Startup\Models\ConfirmationToken;

trait HasConfirmationTokens
{

    public function createConfirmationToken()
    {
        $this->confirmationToken()->create([
            'token' => $token = str_random(config('auth.confirmation_token.length')),
            'expires_at' => $this->freshTimestamp()->addMinutes(config('auth.confirmation_token.expiry')),
        ]);

        return $token;
    }

    public function confirmationToken()
    {
        return $this->hasOne(ConfirmationToken::class);
    }

    public function confirmEmail()
    {
        $this->email_confirmed = true;
        $this->save();

        $this->confirmationToken()->delete();
    }

}
