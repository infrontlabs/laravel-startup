<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManageAccountsController extends Controller
{
    public function index(Request $request)
    {
        $accounts = $request->user()->accounts;

        return view('account.manage.index', compact('accounts'));
    }
}
