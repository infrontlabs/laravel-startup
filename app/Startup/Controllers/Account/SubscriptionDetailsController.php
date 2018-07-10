<?php

namespace Startup\Controllers\Account;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SubscriptionDetailsController extends Controller
{
    public function index()
    {
        $account = request()->account();
        $subscription = $account->subscription('main');
        $stripe = $subscription->asStripeSubscription();

        // $invoices = $account->upcomingInvoice();

        // dd($invoices);

        // dd($stripe);
        $nextBillDate = Carbon::createFromTimeStamp($stripe->current_period_end)->toFormattedDateString();
        $details = [
            'subscription' => $subscription,
            'plan' => $stripe->plan,
            'nextBillDate' => $nextBillDate,
            'paymentMethod' => $account->card_brand . " ending in " . $account->card_last_four,
        ];
        return view('startup::account.subscription.details', compact('details'));
    }
}
