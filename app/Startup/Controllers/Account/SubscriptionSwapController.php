<?php

namespace Startup\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionSwapController extends Controller
{
    public function index(Request $request)
    {
        $plans = collect(config('subscription.plans'))
            ->where('active', true)
            ->where('is_free_trial', false);
        $currentPlan = $request->account()->currentPlan();

        return view('startup::account.subscription.swap', compact('plans', 'currentPlan'));
    }

    public function store(Request $request)
    {
        $request->account()->subscription('main')->swap($request->get('plan'));

        return redirect()->route('account.subscription.index')->withSuccess('Your subscription has been updated');
    }
}
