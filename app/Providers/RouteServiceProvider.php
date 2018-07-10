<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Startup\Models\ConfirmationToken;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
        Route::model('confirmation_token', ConfirmationToken::class);
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapAccountRoutes();

        $this->mapAppRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web', 'bindings')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    protected function mapAccountRoutes()
    {
        Route::middleware(['web', 'auth', 'tenent', 'bindings'])
            ->namespace('Startup\Controllers')
            ->group(base_path('routes/account.php'));
    }

    protected function mapAppRoutes()
    {
        Route::middleware(['web', 'auth', 'tenent', 'subscription.active', 'bindings'])
            ->namespace($this->namespace)
            ->group(base_path('routes/app.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
}
