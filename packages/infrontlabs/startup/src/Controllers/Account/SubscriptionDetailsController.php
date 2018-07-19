<?php

namespace InfrontLabs\Startup\Controllers\Account;

use App\Http\Controllers\Controller;

class SubscriptionDetailsController extends Controller
{
    public function index()
    {

        // $account = request()->account();

        // if ($account->onGenericTrial()) {
        //     return redirect()->route('account.index')->withInfo('Your free trial ends...');
        // }

        // $subscription = $account->subscription('main');
        // $stripe = $subscription->asStripeSubscription();

        // $nextBillDate = Carbon::createFromTimeStamp($stripe->current_period_end)->toFormattedDateString();
        // $details = [
        //     'subscription' => $subscription,
        //     'plan' => $stripe->plan,
        //     'nextBillDate' => $nextBillDate,
        //     'paymentMethod' => $account->card_brand . " ending in " . $account->card_last_four,
        // ];

        $plans = collect(config('subscription.plans'))
            ->where('active', true)
            ->where('is_free_trial', false);
        $currentPlan = request()->account()->currentPlan();
        $invoices = request()->account()->invoicesIncludingPending();

        return view('startup::account.subscription.index',
            compact(
                'plans',
                'currentPlan',
                'invoices')
        );
    }
}
