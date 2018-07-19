<?php

namespace InfrontLabs\Startup\Middleware\Account\Subscription;

use Closure;
use InfrontLabs\Startup\Models\Account;

class RedirectIfSubscriptionActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->account() && $request->account()->isSubscribed()) {
            return redirect()->route('account.subscription.index')->withError('You already have a subscription. Do you want to change plans?');
        }

        return $next($request);
    }
}
