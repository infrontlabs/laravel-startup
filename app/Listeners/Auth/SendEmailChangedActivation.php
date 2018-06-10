<?php

namespace App\Listeners;

use App\Events\Auth\UserChangedEmail;

class SendEmailChangedActivation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserChangedEmail  $event
     * @return void
     */
    public function handle(UserChangedEmail $event)
    {
        //
    }
}
