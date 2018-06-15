<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionSwapController extends Controller
{
    public function index(Request $request)
    {
        $plans = collect(config('subscription.plans'))->where('active', true);
        $currentPlan = $request->account()->currentPlan();

        return view('account.subscription.swap', compact('plans', 'currentPlan'));
    }

    public function store(Request $request)
    {
        $request->account()->subscription('main')->swap($request->get('plan'));

        return redirect()->route('account.subscription.details')->withSuccess('Your subscription has been updated');
    }
}
