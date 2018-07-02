<?php

namespace Tests\Unit;

use App\Account\Models\Account;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;
use Tests\Unit\Fixtures\Project;

class AccountScopeTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @test
     */
    public function models_with_account_scope_trait_are_automatically_constrained_by_current_account()
    {
        $this->createProjectsMigration();
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

        $project1 = Project::create(['name' => 'Project 1', 'account_id' => $account1->id]);
        $project2 = Project::create(['name' => 'Project 2', 'account_id' => $account2->id]);

        $allProjects = Project::all();

        $this->assertEquals(1, $allProjects->count());
        $this->assertEquals($account1->id, $allProjects[0]->account_id);

    }

    protected function createProjectsMigration()
    {
        $exitCode = Artisan::call('migrate', [
            '--path' => '/tests/Unit/fixtures/migrations/',
        ]);

    }
}
