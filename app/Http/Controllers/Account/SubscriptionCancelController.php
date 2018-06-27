<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionCancelController extends Controller
{
    public function index()
    {
        return view('account.subscription.cancel');
    }

    public function process(Request $request)
    {
        $request->account()->cancelSubscription();

        return redirect()->route('account.index')->withSuccess('Your subscription has been cancelled.');
    }
}
