<?php

namespace Startup\Middleware\Account\Subscription;

use Closure;
use Startup\Models\Account;

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
            return redirect()->route('account.index')->withError(__('You already have a subscription'));
        }

        return $next($request);
    }
}
