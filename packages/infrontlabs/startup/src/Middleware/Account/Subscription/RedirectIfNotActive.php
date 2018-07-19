<?php

namespace InfrontLabs\Startup\Middleware\Account\Subscription;

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

        if ($request->account()->isCancelled() || ($request->account()->isNotSubscribed() && $request->account()->isNotOnGenericTrial())) {
            return redirect()->route('plans.index')->withWarning('Please choose a plan to continue');
        }

        return $next($request);
    }
}
