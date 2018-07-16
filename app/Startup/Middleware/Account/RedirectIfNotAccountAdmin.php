<?php

namespace Startup\Middleware\Account;

use Closure;

class RedirectIfNotAccountAdmin
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
        if (!$request->user()->can('admin account')) {
            return redirect()->route('account.index')->withError(__('auth.not_account_admin'));
        }

        return $next($request);
    }
}
