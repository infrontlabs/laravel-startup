<?php

namespace Startup\Traits;

use Startup\Scopes\AccountScope;

trait ScopedForAccounts
{

    public static function bootScopedForAccounts()
    {
        static::addGlobalScope(new AccountScope(app('currentAccount')));
    }

}
