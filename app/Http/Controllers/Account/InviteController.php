<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;

class InviteController extends Controller
{
    public function index()
    {
        return view('app.account.invite');
    }
}
