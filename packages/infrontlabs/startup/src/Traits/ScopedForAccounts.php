<?php

namespace InfrontLabs\Startup\Traits;

use InfrontLabs\Startup\Scopes\AccountScope;

trait ScopedForAccounts
{

    public static function bootScopedForAccounts()
    {
        static::addGlobalScope(new AccountScope(app('currentAccount')));
    }

}
