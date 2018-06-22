<?php

namespace App\Http\Middleware\Account;

use Closure;

class RedirectIfEmailNotConfirmed
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
        if (!$request->user()->email_confirmed) {
            return redirect()->route('account.index')->withError('Your email needs to be confirmed to access that area.');
        }

        return $next($request);
    }
}
