<?php

namespace Startup\Controllers\Account;

// use Illuminate\Http\Request;
use Startup\Models\Account;
use App\Http\Controllers\Controller;

class AccountRedirectController extends Controller
{
    public function __invoke(Account $account)
    {
        return redirect()->route('account.index');
    }

}
