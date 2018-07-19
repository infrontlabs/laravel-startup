<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Infrontlabs\Startup\Middleware\Account\Subscription\RedirectIfNotActive;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \App\Http\Middleware\TrustProxies::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Laravel\Passport\Http\Middleware\CreateFreshApiToken::class,
        ],

        'tenent' => [
            \Infrontlabs\Startup\Middleware\TenentMiddleware::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'auth.register' => \App\Http\Middleware\RedirectToRegistrationIfNotAuthenticated::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'subscription.active' => \Infrontlabs\Startup\Middleware\Account\Subscription\RedirectIfNotActive::class,
        'subscription.notcancelled' => \Infrontlabs\Startup\Middleware\Account\Subscription\RedirectIfCancelled::class,
        'subscription.cancelled' => \Infrontlabs\Startup\Middleware\Account\Subscription\RedirectIfNotCancelled::class,
        'subscription.notcustomer' => \Infrontlabs\Startup\Middleware\Account\Subscription\RedirectIfCustomer::class,
        'subscription.customer' => \Infrontlabs\Startup\Middleware\Account\Subscription\RedirectIfNotCustomer::class,
        'subscription.inactive' => \Infrontlabs\Startup\Middleware\Account\Subscription\RedirectIfSubscriptionActive::class,
        'email.confirmed' => \Infrontlabs\Startup\Middleware\Account\RedirectIfEmailNotConfirmed::class,
        'account.admin' => \Infrontlabs\Startup\Middleware\Account\RedirectIfNotAccountAdmin::class,
    ];
}
