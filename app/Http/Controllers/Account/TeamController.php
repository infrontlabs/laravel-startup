<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    public function index()
    {
        return view('account.invite');
    }
}
