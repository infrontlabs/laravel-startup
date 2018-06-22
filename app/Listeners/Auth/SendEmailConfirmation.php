<?php

namespace App\Listeners\Auth;

use App\Mail\Auth\EmailConfirmation;
use Illuminate\Support\Facades\Mail;

// use Illuminate\Queue\InteractsWithQueue;
// use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmailConfirmation
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Mail::to($event->user)->send(new EmailConfirmation($event->user->createConfirmationToken()));
    }
}
