<?php

namespace InfrontLabs\Startup\Controllers\Account;

// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use InfrontLabs\Startup\Models\Account;

class AccountRedirectController extends Controller
{
    public function __invoke(Account $account)
    {
        return redirect()->route('account.index')->withWelcome('Welcome back to team ' . $account->name . ', ' . request()->user()->first_name . '!');
    }

}
