<?php

namespace App\Account;

use App\Account;

class Manager
{
    protected $account;

    public function setAccount(Account $account)
    {
        $this->account = $account;

        session()->put('account', $this->account->id);
    }

    public function getAccount()
    {
        return $this->account;
    }
}
