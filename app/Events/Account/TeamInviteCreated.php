<?php

namespace App\Events\Account;

use Infrontlabs\Startup\Models\TeamInvite;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TeamInviteCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $invite;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(TeamInvite $invite)
    {
        $this->invite = $invite;
    }

}
