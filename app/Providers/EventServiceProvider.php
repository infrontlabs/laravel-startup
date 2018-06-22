<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\Auth\UserSignedUp' => [
            'App\Listeners\Auth\SendEmailConfirmation',
        ],
        'App\Events\Auth\UserChangedEmail' => [
            'App\Listeners\Auth\SendEmailConfirmation',
        ],
        'App\Events\Account\TeamInviteCreated' => [
            'App\Listeners\Account\SendTeamInviteEmail',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
