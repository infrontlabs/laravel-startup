<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\WithFaker;
use App\Account\Models\Account;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AccountsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function user_belongs_to_accounts()
    {
        $user = factory(User::class)->make([
            'id' => 12345,
        ]);

        $user->accounts()->save(factory(Account::class)->make());
        $user->accounts()->save(factory(Account::class)->make());

        $this->assertEquals($user->accounts()->count(), 2);
    }
}
