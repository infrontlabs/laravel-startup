<?php

namespace App\Http\Controllers\Account;

use App\Account;
use App\Account\Manager;
use App\Http\Controllers\Controller;
use App\Http\Requests\Account\CreateAccountRequest;
use Illuminate\Http\Request;

class ManageAccountsController extends Controller
{
    public function index(Request $request)
    {
        $accounts = $request->user()->accounts;

        return view('account.manage.index', compact('accounts'));
    }

    public function store(CreateAccountRequest $request)
    {
        $request->user()->accounts()->save($account = Account::create([
            'name' => $request->get('account_name'),
        ]));

        app(Manager::class)->setAccount($account);

        return back()->withSuccess('Account created!');
    }
}
