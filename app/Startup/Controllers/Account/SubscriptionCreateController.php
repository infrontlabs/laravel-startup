<?php

namespace Startup\Controllers\Account;

use App\Http\Controllers\Controller;
use Startup\Requests\Account\CreateSubscriptionRequest;

class SubscriptionCreateController extends Controller
{
    public function process(CreateSubscriptionRequest $request)
    {
        $plans = collect(config('subscription.plans'))->where('active', true);
        $selectedPlan = $plans->where('stripe_id', $request->get('plan'))->first();

        if (!$selectedPlan) {
            return redirect()->route('plans.index')->withError('There was a problem. Please select another plan.');
        }

        try {
            $request->account()->createSubscription(
                $selectedPlan['stripe_id'],
                $request->get('stripe_token')
            );
            $request->account()->billing_name = $request->get('billing_name');
            $request->account()->save();
        } catch (\Stripe\Error\Card $e) {
            return back()->withError($e->getMessage());
        }

        return redirect()->route('account.subscription.details')->withSuccess('Your subscription has started!');
    }
}
