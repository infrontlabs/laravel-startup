<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\UpdateCardRequest;

class SubscriptionCardController extends Controller
{
    public function index()
    {
        return view('account.subscription.card');
    }

    public function store(UpdateCardRequest $request)
    {
        $request->account()->updateCard($request->get('stripe_token'));

        return redirect()->route('account.index')->withSuccess('Your card has been updated.');
    }
}
