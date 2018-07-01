<?php

namespace App\Account\Traits;

use App\Account\Scopes\AccountScope;

trait ScopedForAccounts
{

    public static function bootScopedForAccounts()
    {
        static::addGlobalScope(new AccountScope(app('currentAccount')));
    }

}
