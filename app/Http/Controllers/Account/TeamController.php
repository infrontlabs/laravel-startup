<?php

namespace App\Http\Controllers\Account;

use App\Account\Models\TeamInvite;
use App\Account\Requests\TeamInviteRequest;
use App\Events\Account\TeamInviteCreated;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(Request $request)
    {
        $members = $request->account()->members;

        return view('account.team.index', compact('members'));
    }

    public function invite(TeamInviteRequest $request)
    {

        $this->authorize('teams.users.manage');

        $invite = $request->account()->invites()->save(new TeamInvite($request->only(['email', 'role'])));

        event(new TeamInviteCreated($invite));

        return redirect()->route('account.team');
    }

    public function resendInvite(TeamInvite $teamInvite, Request $request)
    {

        $this->authorize('teams.users.manage');

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
        $this->authorize('teams.users.manage');

        $request->account()->members()->detach($user->id);

        return back()->withSuccess('Member has been removed from the team.');
    }
}
