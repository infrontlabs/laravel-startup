<?php

namespace Startup\Middleware;

use Closure;
use Startup\Models\Account;

class TenentMiddleware
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

        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $account = $this->resolveAccount(
            $request->account ?: optional($request->user()->currentAccount)->hash_id
        );

        // validate ownership/membership
        if (!$account || !$request->user()->accountIsValid($account)) {
            $account = $request->user()->firstOwnedAccount() ?? $request->user()->accounts()->first();
        }

        // somehow an account was not created for this user. Highly unlikely but want to be sure it's captured here.
        if (!$account) {
            return redirect()->route('home')->withError('Sorry, there was a problem accessing your account.');
        }

        $request->user()->setCurrentAccount($account);

        return $next($request);
    }

    public function registerAccount(Account $account)
    {
        auth()->user()->setCurrentAccount($account);
    }

    public function resolveAccount($hashid)
    {
        $id = collect(app('hashid')->decode($hashid))->first();

        return Account::find($id);
    }
}
