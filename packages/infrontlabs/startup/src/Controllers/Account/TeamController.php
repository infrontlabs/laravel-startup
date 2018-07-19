<?php

namespace InfrontLabs\Startup\Controllers\Account;

use App\Events\Account\TeamInviteCreated;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use InfrontLabs\Startup\Models\TeamInvite;
use InfrontLabs\Startup\Requests\Account\TeamInviteRequest;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        return view('startup::account.team.index');
    }

    public function invite(TeamInviteRequest $request)
    {

        // $this->authorize('admin account');

        $invite = $request->account()->invites()->save(new TeamInvite($request->only(['email', 'role'])));

        event(new TeamInviteCreated($invite));

        return redirect()->route('account.team')->withSuccess(__('team.invite_success'));
    }

    public function resendInvite(TeamInvite $teamInvite, Request $request)
    {

        // $this->authorize('admin account');

        $invite = $request->account()->invites()->save(new TeamInvite([
            'email' => $teamInvite->email,
            'role' => $teamInvite->role,
        ]));

        $teamInvite->delete();

        event(new TeamInviteCreated($invite));

        return redirect()->route('account.team');
    }

    public function delete(Request $request, User $user)
    {
        // $this->authorize('admin account');

        $request->account()->members()->detach($user->id);

        return back()->withSuccess('Member has been removed from the team.');
    }
}
