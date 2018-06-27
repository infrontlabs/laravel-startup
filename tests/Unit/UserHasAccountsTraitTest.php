<?php

namespace Tests\Unit;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserHasAccountTraitTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @test
     */
    public function as_a_user_i_want_manage_an_account()
    {
        $user = factory(User::class)->create();
        $account = $user->createAccount(['name' => 'Account name']);
        $this->assertTrue($user->isOwnerOfAccount($account));
        $this->assertTrue($account->isOwner($user));
    }

    /**
     * @test
     */
    public function as_a_user_i_want_manage_multiple_accounts()
    {
        $user = factory(User::class)->create();
        $account = $user->createAccount(['name' => 'One']);
        $account = $user->createAccount(['name' => 'Two']);
        $account = $user->createAccount(['name' => 'Three']);
        $this->assertEquals($user->ownedAccounts->count(), 3);
    }

    /**
     * @test
     */
    public function as_an_account_owner_I_want_to_add_members()
    {
        $owner = factory(User::class)->create();
        $member1 = factory(User::class)->create();
        $member2 = factory(User::class)->create();

        $account = $owner->createAccount(['name' => 'Test Account']);

        $account->addMember($member1, ['role' => 'testrole1']);
        $account->addMember($member2, ['role' => 'testrole2']);

        $this->assertEquals($account->members->count(), 2);

        $this->assertDatabaseHas('account_user', [
            'account_id' => $account->id,
            'user_id' => $member1->id,
            'role' => 'testrole1',
        ]);

        $this->assertDatabaseHas('account_user', [
            'account_id' => $account->id,
            'user_id' => $member2->id,
            'role' => 'testrole2',
        ]);

    }

    /**
     * @test
     */
    public function a_user_has_a_current_account()
    {
        $owner = factory(User::class)->create();
        $account = $owner->createAccount(['name' => 'Test Account']);
        $owner->setCurrentAccount($account);

        $this->assertNotNull($owner->currentAccount);
        $this->assertEquals($owner->currentAccount->name, 'Test Account');
    }

    /**
     * @test
     */
    public function test_if_user_is_either_owner_or_member_of_account()
    {
        $owner1 = factory(User::class)->create();
        $account1 = $owner1->createAccount(['name' => 'Test Account']);

        $owner2 = factory(User::class)->create();
        $account2 = $owner2->createAccount(['name' => 'Test Account']);

        $this->assertFalse($owner1->accountIsValid(null));
        $this->assertFalse($owner1->accountIsValid($account2));
    }
}
