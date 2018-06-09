<?php

namespace App\Account\Middleware;

use App\Account;
use App\Account\Manager;
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
        $account = $this->resolveAccount(
            $request->account ?: session()->get('account')
        );

        if (!$account || !auth()->user()->isMemberOf($account)) {
            return redirect()->route('app.accounts');
        }

        $this->registerAccount($account);

        return $next($request);
    }

    public function registerAccount(Account $account)
    {
        app(Manager::class)->setAccount($account);
    }

    public function resolveAccount($id)
    {
        return Account::find($id);
    }
}
