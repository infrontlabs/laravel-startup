<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        $plans = collect(config('subscription.plans'))->where('active', true);

        return view('app.account.subscription', compact('plans'));
    }

    public function process(Request $request)
    {
        $request->account()->createSubscription('basic', $request->get('stripe_token'));

        return back();
    }
}
