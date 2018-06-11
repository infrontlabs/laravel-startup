<?php

namespace App\Http\Middleware\Subscription;

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
            return redirect()->route('account.profile');
        }
        return $next($request);
    }
}
