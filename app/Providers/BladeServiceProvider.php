<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('subscribed', function () {
            return auth()->check() && request()->account()->isSubscribed();
        });

        Blade::if('notsubscribed', function () {
            return !auth()->check() || request()->account()->isNotSubscribed();
        });

        Blade::if('subscriptioncancelled', function () {
            return request()->account()->isCancelled();
        });

        Blade::if('subscriptionnotcancelled', function () {
            return request()->account()->isNotCancelled();
        });

        Blade::if('emailconfirmed', function () {
            return auth()->user()->email_confirmed;
        });

        Blade::if('emailnotconfirmed', function () {
            return !auth()->user()->email_confirmed;
        });

        Blade::if('subscriptionontrial', function () {
            return request()->account()->isOnTrial();
        });

        Blade::if('ongenerictrial', function () {
            return request()->account()->onGenericTrial();
        });

        Blade::if('generictrialhasended', function () {
            return request()->account()->genericTrialHasEnded();
        });

    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
