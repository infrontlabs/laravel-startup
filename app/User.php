<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Infrontlabs\Startup\Traits\HasAccounts;
use Infrontlabs\Startup\Traits\HasConfirmationTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, HasConfirmationTokens, HasAccounts;

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getFullNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }
}
