<?php

namespace App\Account\Traits;

use App\Account\Scopes\AccountScope;

trait ForAccounts
{

    public static function boot()
    {
        parent::boot();

        static::addGlobalScope(new AccountScope(app('currentAccount')));
    }

}
