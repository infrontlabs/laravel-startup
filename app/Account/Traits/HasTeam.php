<?php

namespace App\Account\Traits;

use App\User;

trait HasTeam
{
    public function members()
    {
        return $this->belongsToMany(User::class)->withPivot('role');
    }
}
