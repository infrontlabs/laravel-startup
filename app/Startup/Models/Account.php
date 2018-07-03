<?php

namespace Startup\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Cashier\Billable;
use Startup\Traits\HasSubscriptions;
use Startup\Traits\HasTeam;

class Account extends Model
{
    use Billable, HasSubscriptions, HasTeam;

    protected $guarded = [];

    protected $casts = [
        'trial_ends_at' => 'date',
    ];

    public function getRouteKeyName()
    {
        return 'hash_id';
    }

    public function getHashIdAttribute()
    {
        return app('hashid')->encode($this->id); // VolejRejNm
    }

}
