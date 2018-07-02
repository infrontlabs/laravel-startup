<?php

namespace Tests\Unit\Fixtures;

use App\Account\Models\Account;
use App\Account\Traits\ScopedForAccounts;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    use ScopedForAccounts;

    protected $guarded = [];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
