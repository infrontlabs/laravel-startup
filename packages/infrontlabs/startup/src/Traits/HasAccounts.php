<?php

namespace InfrontLabs\Startup\Traits;

use InfrontLabs\Startup\Models\Account;

trait HasAccounts
{
    public function accounts()
    {
        return $this->belongsToMany(Account::class)->withPivot('role');
    }

    public function currentAccount()
    {
        return $this->hasOne(Account::class, 'id', 'current_account_id');
    }

    public function ownedAccounts()
    {
        return $this->hasMany(Account::class, 'owner_id');
    }

    public function isMemberOfAccount(Account $account)
    {
        return $this->accounts->contains('id', $account->id);
    }

    public function isNotMemberOfAccount(Account $account)
    {
        return !$this->isMemberOfAccount($account);
    }

    public function isOwnerOfAccount(Account $account)
    {
        return ($this->ownedAccounts()
                ->where('id', $account->id)->first()
        ) ? true : false;
    }

    public function isNotOwnerOfAccount(Account $account)
    {
        return !$this->isOwnerOfAccount($account);
    }

    public function createAccount($accountData)
    {
        $account = $this->ownedAccounts()->save(new Account($accountData));

        return $account;
    }

    public function setCurrentAccount(?Account $account)
    {
        $this->current_account_id = optional($account)->id;
        $this->save();
        $this->load('currentAccount');

    }

    public function accountIsValid(?Account $account)
    {
        if (!$account) {
            return false;
        }

        if ($this->isNotMemberOfAccount($account) && $this->isNotOwnerOfAccount($account)) {
            return false;
        }

        return true;
    }

    public function firstOwnedAccount()
    {
        return $this->ownedAccounts()->first();
    }

}
