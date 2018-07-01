<?php

namespace Tests\Unit;

use App\Account\Models\Account;
use App\Account\Models\TeamInvite;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccountScopeTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @test
     */
    public function models_with_account_scope_trait_are_automatically_constrained_by_current_account()
    {

        $user = factory(User::class)->create(['id' => 1]);

        $account1 = factory(Account::class)->create([
            'id' => 45678,
            'owner_id' => 1,
        ]);

        $account2 = factory(Account::class)->create([
            'owner_id' => 1,
        ]);
        $user->setCurrentAccount($account1);

        $this->app->instance('currentAccount', $user->currentAccount);

        $invite1 = factory(TeamInvite::class)->create([
            'account_id' => $account1->id,
        ]);

        $invite2 = factory(TeamInvite::class)->create([
            'account_id' => $account2->id,
        ]);

        $allInvites = TeamInvite::all();

        $this->assertEquals(1, $allInvites->count());
        $this->assertEquals(45678, $allInvites[0]->account_id);

    }
}
