<?php

namespace Startup\Controllers\Account;

use App\Http\Controllers\Controller;
use Startup\Requests\Account\UpdateCardRequest;

class SubscriptionCardController extends Controller
{
    public function index()
    {
        return view('startup::account.subscription.card');
    }

    public function store(UpdateCardRequest $request)
    {
        try {
            $request->account()->updateCard(
                $request->get('stripe_token')
            );
            $request->account()->billing_name = $request->get('billing_name');
            $request->account()->save();
        } catch (\Stripe\Error\Card $e) {
            return back()->withError($e->getMessage());
        }

        return redirect()->route('account.index')->withSuccess('Your card has been updated.');
    }
}
