<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionCreateController extends Controller
{
    public function index(Request $request)
    {
        $plans = collect(config('subscription.plans'))->where('active', true);

        return view('account.subscribe.index', compact('plans'));
    }

    public function process(Request $request)
    {
        $request->account()->createSubscription('basic', $request->get('stripe_token'));

        return redirect()->route('account.subscription.details')->withSuccess('Your subscription has started!');
    }
}
