<?php

namespace InfrontLabs\Startup\Controllers\Account;

use InfrontLabs\Startup\Models\TeamInvite;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserInvitesController extends Controller
{
    public function index(Request $request)
    {
        $invites = TeamInvite::whereEmail(auth()->user()->email)->get();

        return view('startup::account.user.invites', compact('invites'));
    }

    public function accept(TeamInvite $teamInvite)
    {
        // @todo replace with middleware
        if ($teamInvite->email !== auth()->user()->email) {
            return back()->withError('Invite could not be accepted. Please try again.');
        }
        $teamInvite->account->members()->attach(auth()->user()->id, ['role' => $teamInvite->role]);
        $teamInvite->delete();

        return back()->withSuccess('Invite to <strong>' . $teamInvite->account->name . '</strong> accepted!');

    }
}
