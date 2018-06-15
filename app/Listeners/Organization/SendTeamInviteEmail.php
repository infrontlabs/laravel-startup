<?php

namespace App\Listeners\Account;

use App\Events\Account\TeamInviteCreated;
use App\Mail\Account\TeamInviteEmail;
use Illuminate\Support\Facades\Mail;

class SendTeamInviteEmail
{
    /**
     * Handle the event.
     *
     * @param  TeamInviteCreated  $event
     * @return void
     */
    public function handle(TeamInviteCreated $event)
    {
        Mail::to($event->invite->email)->send(new TeamInviteEmail());

    }
}
