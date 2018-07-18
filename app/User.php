<?php

namespace App;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Startup\Traits\HasAccounts;
use Startup\Traits\HasConfirmationTokens;


/**
 * @property    int                             $id
 * @property    string                          $first_name
 * @property    string                          $last_name
 * @property    string                          $email
 * @property    string                          $password
 * @property    string|null                     $remember_token
 * @property    bool                            $email_confirmed
 * @property    int|null                        $current_account_id
 * @property    \Carbon\Carbon                  $created_at
 * @property    \Carbon\Carbon                  $updated_at
 */
class User extends Authenticatable implements \JsonSerializable
{
    use Notifiable, HasApiTokens, HasConfirmationTokens, HasAccounts, HasTimestamps;

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
