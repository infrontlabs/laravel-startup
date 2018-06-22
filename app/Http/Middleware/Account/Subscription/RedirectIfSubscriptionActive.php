<?php

namespace App\Http\Middleware\Account\Subscription;

use App\Account\Models\Account;
use Closure;

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
        $account = $request->account();
        if (!$account && session()->get('account')) {
            $account = Account::where('uuid', session()->get('account'))->first();
        }

        if ($request->user() && $account && $account->isSubscribed()) {
            return redirect()->route('account.index')->withError('You already have a subscription');
        }

        return $next($request);
    }
}
