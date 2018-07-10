<?php

namespace Startup\Middleware\Account\Subscription;

use Closure;

class RedirectIfNotActive
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

        if ($request->account()->isCancelled() || $request->account()->isNotSubscribed()) {
            return redirect()->route('plans.index')->withError('You need a subscription to access that area.');
        }

        return $next($request);
    }
}
