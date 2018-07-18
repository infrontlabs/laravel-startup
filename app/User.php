<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Startup\Traits\HasAccounts;
use Startup\Traits\HasConfirmationTokens;


class User extends Authenticatable implements \JsonSerializable
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

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'accounts' => $this->accounts,
        ];
    }

}
