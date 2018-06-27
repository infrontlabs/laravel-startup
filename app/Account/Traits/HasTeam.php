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

    public function addMember(User $user, $pivotData)
    {
        return $this->members()->attach($user, $pivotData);
    }

    public function owner()
    {
        return $this->hasOne(User::class, 'id', 'owner_id');
    }

    public function isMember(User $user)
    {
        return $this->members()->where('id', $user->id)->first() ? true : false;
    }

    public function isOwner(User $user)
    {
        return $this->owner()->where('id', $user->id)->first() ? true : false;
    }

    public function invites()
    {
        return $this->hasMany(TeamInvite::class);
    }
}
