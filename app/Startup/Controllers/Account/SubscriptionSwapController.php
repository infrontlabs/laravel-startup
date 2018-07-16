<?php

namespace Startup\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionSwapController extends Controller
{
    public function store(Request $request)
    {
        $request->account()->subscription('main')->swap($request->get('plan'));

        return redirect()->route('account.subscription.index')->withSuccess('Your subscription has been updated');
    }
}
