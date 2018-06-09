<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;

class BillingController extends Controller
{
    public function index()
    {
        return view('app.account.billing');
    }
}
