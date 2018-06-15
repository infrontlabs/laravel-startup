<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SubscriptionDetailsController extends Controller
{
    public function index()
    {
        $account = request()->account();
        $sub = $account->subscription('main')->asStripeSubscription();
        $nextBillDate = Carbon::createFromTimeStamp($sub->current_period_end)->format('F jS, Y');
        $details = [
            'plan' => $sub->plan,
            'nextBillDate' => $nextBillDate,
            'paymentMethod' => $account->card_brand . " ****" . $account->card_last_four,
        ];
        return view('account.org.subscription.details', compact('details'));
    }
}
