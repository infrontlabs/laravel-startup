<?php

namespace App\Account\Traits;

use App\Account\Models\TeamInvite;
use App\User;

trait HasTeam
{
    public function members()
    {
        return $this->belongsToMany(User::class)->withPivot('role');
    }

    public function invites()
    {
        return $this->hasMany(TeamInvite::class);
    }
}
