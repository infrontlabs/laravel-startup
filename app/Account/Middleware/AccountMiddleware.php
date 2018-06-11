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
            $this->registerAccount(auth()->user()->accounts()->first());

            return redirect()->route('account.accounts')->withError('There was a problem switching accounts. Please try again.');
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
        $account = Account::find($id);

        if (!$account && auth()->user()) {
            $account = auth()->user()->accounts()->first();
        }

        return $account;
    }
}
