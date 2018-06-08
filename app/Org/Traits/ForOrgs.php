<?php

namespace App\Org\Traits;

use App\Org\Manager;
use App\Org\Scopes\OrgScope;

trait ForOrgs
{

    public static function boot()
    {
        parent::boot();

        $manager = app(Manager::class);

        static::addGlobalScope(new OrgScope($manager->getOrg()));
    }

}
