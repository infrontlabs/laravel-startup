<?php

namespace App\Http\Middleware\Account\Subscription;

use Closure;

class RedirectIfCustomer
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
        if ($request->account()->isCustomer()) {
            return redirect()->route('account.index');
        }

        return $next($request);
    }
}
