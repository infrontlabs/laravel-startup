<?php

namespace InfrontLabs\Startup\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use InfrontLabs\Startup\Models\Account;
use InfrontLabs\Startup\Requests\Account\CreateAccountRequest;

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

        return redirect()->route('plans.index')->withSuccess('Team account created! Please select a plan.');
    }
}
