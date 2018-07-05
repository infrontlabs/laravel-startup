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
        $request->account()->updateCard($request->get('stripe_token'));

        return redirect()->route('account.index')->withSuccess('Your card has been updated.');
    }
}
