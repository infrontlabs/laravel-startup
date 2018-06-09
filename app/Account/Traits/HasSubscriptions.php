<?php

namespace App\Account\Traits;

trait HasSubscriptions
{
    public function isSubscribed()
    {
        return $this->subscribed('main');
    }

    public function isNotSubscribed()
    {
        return !$this->isSubscribed();
    }
}
