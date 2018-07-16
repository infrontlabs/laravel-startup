<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Tests\TestCase;

class TeamInvitesTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function account_owner_can_send_team_invites()
    {
        $this->withoutExceptionHandling();
        $owner = factory(User::class)->create();
        $account = $owner->createAccount(['name' => 'Test Account']);
        $owner->setCurrentAccount($account);
        $account->startGenericTrial();

        $response = $this->actingAs($owner)
            ->post(route('account.team.invite'), [
                'email' => 'test@test.com',
                'role' => 'test',
            ]);
        $response->assertRedirect(route('account.team'))
            ->assertSessionHas('success', __('team.invite_success'));

        $this->assertDatabaseHas('team_invites', [
            'email' => 'test@test.com',
            'role' => 'test',
            'account_id' => $account->id,
        ]);
    }

    /**
     * @test
     */
    public function account_admin_can_send_team_invites()
    {
        $this->withoutExceptionHandling();
        $owner = factory(User::class)->create();
        $admin = factory(User::class)->create();
        $account = $owner->createAccount(['name' => 'Test Account']);
        $account->startGenericTrial();

        $account->addMember($admin, ['role' => 'admin']);

        $response = $this->actingAs($admin)
            ->post(route('account.team.invite'), [
                'email' => 'test@test.com',
                'role' => 'test',
            ]);

        $response->assertRedirect(route('account.team'))
            ->assertSessionHas('success', __('team.invite_success'));

        $this->assertDatabaseHas('team_invites', [
            'email' => 'test@test.com',
            'role' => 'test',
            'account_id' => $account->id,
        ]);
    }

    /**
     * @test
     */
    public function non_account_admins_cant_send_team_invites()
    {
        // $this->withoutExceptionHandling();
        $owner = factory(User::class)->create();
        $admin = factory(User::class)->create();
        $account = $owner->createAccount(['name' => 'Test Account']);
        $account->startGenericTrial();

        $account->addMember($admin, ['role' => 'somerolenotadmin']);

        $response = $this->actingAs($admin)
            ->post(route('account.team.invite'), [
                'email' => 'test@test.com',
                'role' => 'test',
            ]);

        $response->assertStatus(Response::HTTP_FORBIDDEN);

        $this->assertDatabaseMissing('team_invites', [
            'email' => 'test@test.com',
            'role' => 'test',
            'account_id' => $account->id,
        ]);
    }
}
