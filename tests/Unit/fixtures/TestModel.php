<?php

namespace Tests\Unit\Fixtures;

use Startup\Models\Account;
use Startup\Traits\ScopedForAccounts;
use Illuminate\Database\Eloquent\Model;

class TestModel extends Model
{
    use ScopedForAccounts;

    protected $guarded = [];

    protected $table = 'test_table_for_account_scoping';

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
