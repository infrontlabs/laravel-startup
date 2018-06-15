<?php

namespace App\Account\Middleware;

use App\Account\Manager;
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
        $account = $this->resolveAccount(
            $request->account ?: session()->get('account')
        );

        if (!$account || !auth()->user()->isMemberOf($account)) {
            $this->registerAccount(auth()->user()->accounts()->first());

            return redirect()->route('accounts')->withError('There was a problem switching account. Please try again.');
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
        $account = Account::where('uuid', $id)->first();

        if (!$account && auth()->user()) {
            $account = auth()->user()->accounts()->first();
        }

        return $account;
    }
}
