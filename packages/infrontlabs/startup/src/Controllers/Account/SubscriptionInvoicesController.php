<?php

namespace InfrontLabs\Startup\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubscriptionInvoicesController extends Controller
{
    public function index(Request $request)
    {
        $invoices = $request->account()->invoicesIncludingPending();

        return view('startup::account.subscription.invoices', compact('invoices'));

    }

    public function download(Request $request, $invoiceId)
    {
        return $request->account()->downloadInvoice($invoiceId, [
            'vendor' => config('app.name'),
            'product' => 'Your Product',
        ]);

    }
}
