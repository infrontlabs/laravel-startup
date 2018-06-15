<?php

namespace App\Account;

use App\Account\Models\Account;

class Manager
{
    protected $account;

    public function setAccount(Account $account)
    {
        $this->account = $account;

        session()->put('account', $this->account->uuid);
    }

    public function getAccount()
    {
        return $this->account;
    }
}
