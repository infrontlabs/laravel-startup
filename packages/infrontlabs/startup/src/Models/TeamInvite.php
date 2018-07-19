<?php

namespace InfrontLabs\Startup\Models;

use Illuminate\Database\Eloquent\Model;
use InfrontLabs\Startup\Models\Account;

class TeamInvite extends Model
{

    protected $guarded = [];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
