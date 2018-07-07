<?php

namespace Startup\Tests\Unit\Fixtures;

use Illuminate\Database\Eloquent\Model;
use Startup\Models\Account;
use Startup\Traits\ScopedForAccounts;

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
