<?php

namespace App\Account\Middleware;

use App\Account\Models\Account;
use Closure;

class AccountMiddleware
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
            $request->account ?: optional($request->user()->currentAccount)->uuid
        );

        // validate ownership/membership
        if (!$request->user()->accountIsValid($account)) {
            $account = $request->user()->firstOwnedAccount();
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

    public function resolveAccount($id)
    {
        return Account::where('uuid', $id)->first();
    }
}
