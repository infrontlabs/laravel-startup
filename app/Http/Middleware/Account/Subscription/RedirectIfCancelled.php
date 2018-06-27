<?php

namespace App\Http\Middleware\Account\Subscription;

use Closure;

class RedirectIfCancelled
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
        if ($request->account()->isNotSubscribed() || $request->account()->isCancelled()) {
            return redirect()->route('account.subscription.resume');
        }
        return $next($request);
    }
}
