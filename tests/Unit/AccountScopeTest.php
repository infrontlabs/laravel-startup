<?php

namespace Tests\Unit;

use Startup\Models\Account;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Tests\Unit\Fixtures\TestModel;

class AccountScopeTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @test
     */
    public function models_with_account_scope_trait_are_automatically_constrained_by_current_account()
    {
        $this->createTestModelMigration();
        $user = factory(User::class)->create(['id' => 1]);

        $account1 = factory(Account::class)->create([
            'id' => 45678,
            'owner_id' => 1,
        ]);

        $account2 = factory(Account::class)->create([
            'owner_id' => 1,
        ]);
        $user->setCurrentAccount($account1);

        $this->actingAs($user);

        $test1 = TestModel::create(['account_id' => $account1->id]);
        $test2 = TestModel::create(['account_id' => $account2->id]);

        $allTests = TestModel::all();

        $this->assertEquals(1, $allTests->count());
        $this->assertEquals($account1->id, $allTests[0]->account_id);

    }

    protected function createTestModelMigration()
    {
        $exitCode = Artisan::call('migrate', [
            '--path' => '/tests/Unit/fixtures/migrations/',
        ]);

    }
}
