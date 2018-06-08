<?php

namespace App\Org;

use App\Org;

class Manager
{
    protected $org;

    public function setOrg(Org $org)
    {
        $this->org = $org;
    }

    public function getOrg()
    {
        return $this->org;
    }
}
