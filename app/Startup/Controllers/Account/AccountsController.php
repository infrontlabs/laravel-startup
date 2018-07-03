<?php

namespace Startup\Controllers\Account;

use App\Http\Controllers\Controller;

class AccountsController extends Controller
{
    public function index()
    {
        $accounts = auth()->user()->accounts;

        return view('app.accounts', compact('accounts'));
    }
}
