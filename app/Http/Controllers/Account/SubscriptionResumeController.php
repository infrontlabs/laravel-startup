<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionResumeController extends Controller
{
    public function index()
    {
        return view('account.org.subscription.resume');
    }

    public function process(Request $request)
    {
        $request->account()->subscription('main')->resume();

        return redirect()->route('account.org.subscription.details')->withSuccess('Your subscription has been resumed.');
    }
}
