<?php

namespace App\Http\Controllers\Account;

use App\Events\Account\TeamInviteCreated;
use App\Http\Controllers\Controller;
use App\Account\Models\TeamInvite;
use App\Account\Requests\TeamInviteRequest;
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

        $invite = $request->account()->invites()->save(new TeamInvite($request->only(['email', 'role'])));

        event(new TeamInviteCreated($invite));

        return redirect()->route('account.team');
    }

    public function resendInvite(TeamInvite $teamInvite, Request $request)
    {
        $invite = $request->account()->invites()->save(new TeamInvite([
            'email' => $teamInvite->email,
            'role' => $teamInvite->role,
        ]));

        $teamInvite->delete();

        event(new TeamInviteCreated($invite));

        return redirect()->route('account.team');
    }
}
