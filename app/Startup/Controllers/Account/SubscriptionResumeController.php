<?php

namespace Startup\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionResumeController extends Controller
{
    public function index()
    {
        return view('startup::account.subscription.resume');
    }

    public function process(Request $request)
    {
        $request->account()->subscription('main')->resume();

        return redirect()->route('account.subscription.index')->withSuccess('Your subscription has been resumed.');
    }
}
