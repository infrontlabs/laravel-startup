<?php

namespace Startup\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\CreateAccountRequest;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(Request $request)
    {
        return view('startup::account.settings');
    }

    public function store(CreateAccountRequest $request)
    {
        $request->account()->update([
            'name' => $request->get('account_name'),
        ]);

        return back()->withSuccess('Your account has been updated.');
    }
}
