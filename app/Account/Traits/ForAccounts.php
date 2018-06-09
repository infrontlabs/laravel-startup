<?php

namespace App\Account\Traits;

use App\Account\Manager;
use App\Account\Scopes\AccountScope;

trait ForAccounts
{

    public static function boot()
    {
        parent::boot();

        $manager = app(Manager::class);

        static::addGlobalScope(new AccountScope($manager));
    }

}
