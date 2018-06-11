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
