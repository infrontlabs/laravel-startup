<?php

namespace Startup\Traits;

use Startup\Models\ConfirmationToken;

trait HasConfirmationTokens
{

    protected $tokenLength = 255;
    protected $tokenExpiryMinutes = 60;

    public function createConfirmationToken()
    {
        $this->confirmationToken()->create([
            'token' => $token = str_random($this->tokenLength),
            'expires_at' => $this->freshTimestamp()->addMinutes($this->tokenExpiryMinutes),
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
