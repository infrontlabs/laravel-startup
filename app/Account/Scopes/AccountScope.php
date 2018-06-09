<?php

namespace App\Account\Scopes;

use App\Account;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class AccountScope implements Scope
{

    protected $account;

    public function __construct(Account $account)
    {
        $this->account = $account->id;
    }

    public function apply(Builder $builder, Model $model)
    {
        return $builder->where($this->account->getForeignKey(), '=', $this->account->getPrimaryKey());
    }
}
