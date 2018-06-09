<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index()
    {
        return view('app.account.subscription');
    }

    public function process(Request $request)
    {
        $request->account()->newSubscription('main', 'basic')->create($request->get('stripe_token'), [
            'email' => auth()->user()->email,
        ]);

        return back();
    }
}
