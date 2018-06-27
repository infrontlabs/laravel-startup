<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton('currentAccount', function () {
            return optional(auth()->user())->currentAccount;
        });

        View::composer('*', function ($view) {
            $view->with('account', optional(auth()->user())->currentAccount);
        });

        View::composer('account.team.index', function ($view) {
            $canmanageteams = optional(auth()->user())->can('teams.users.manage');
            $view->with('canmanageteams', $canmanageteams);
        });

        Request::macro('account', function () {
            return optional(auth()->user())->currentAccount;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
