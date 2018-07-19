<?php

namespace InfrontLabs\Startup\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use InfrontLabs\Startup\Requests\Account\UpdateCardRequest;

class SubscriptionCardController extends Controller
{
    public function index(Request $request)
    {
        $cards = $request->account()->cards();

        return view('startup::account.subscription.card', compact('cards'));
    }

    public function store(UpdateCardRequest $request)
    {
        try {
            $request->account()->deleteCards();

            $request->account()->updateCard(
                $request->get('stripe_token')
            );
            $request->account()->billing_name = $request->get('billing_name');
            $request->account()->save();
        } catch (\Stripe\Error\Card $e) {
            return back()->withError($e->getMessage());
        }

        return redirect()->route('account.subscription.card')->withSuccess('Your card has been updated.');
    }
}
