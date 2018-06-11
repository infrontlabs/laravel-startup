<?php

namespace App\Http\Controllers\Account;

// use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountRedirectController extends Controller
{
    public function __invoke()
    {
        return redirect()->route('account.profile');
    }

}
