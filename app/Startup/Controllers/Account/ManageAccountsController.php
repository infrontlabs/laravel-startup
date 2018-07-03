<?php

namespace Startup\Controllers\Account;

use Startup\Models\Account;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\CreateAccountRequest;
use Illuminate\Http\Request;

class ManageAccountsController extends Controller
{
    public function index(Request $request)
    {
        $ownedAccounts = $request->user()->ownedAccounts;
        $accounts = $request->user()->accounts;

        return view('startup::account.manage.index', compact('ownedAccounts', 'accounts'));
    }

    public function store(CreateAccountRequest $request)
    {
        $account = $request->user()->createAccount([
            'name' => $request->get('account_name'),
        ]);
        $request->user()->setCurrentAccount($account);

        return redirect()->route('account.index')->withSuccess('Account created!');
    }
}
