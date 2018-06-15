<?php

namespace Tests\Browser;

use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ChangePasswordTest extends DuskTestCase
{

    use DatabaseMigrations;

    /**
     * @test
     */
    public function user_can_change_password()
    {
        $user = factory(User::class)->create([
            'password' => 'secret',
        ]);
        $user->accounts()->save(factory(Account::class)->make());

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)->visit(route('account.password'))
                ->assertSee('Change password');
        });
    }
}
