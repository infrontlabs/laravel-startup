<?php

namespace App;

use App\Traits\HasConfirmationTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, HasConfirmationTokens;

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function accounts()
    {
        return $this->belongsToMany(Account::class);
    }

    public function isMemberOf(Account $account)
    {
        return $this->accounts->contains('id', $account->id);
    }
}
