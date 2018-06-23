<?php

namespace App\Providers;

use App\Account\Manager;
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
        $this->app->singleton(Manager::class, function () {
            return new Manager;
        });

        View::composer('*', function ($view) {
            $view->with('account', app(Manager::class)->getAccount());
        });

        View::composer('account.team.index', function ($view) {
            $canmanageteams = auth()->user()->can('teams.users.manage');
            $view->with('canmanageteams', $canmanageteams);
        });

        Request::macro('account', function () {
            return app(Manager::class)->getAccount();
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
