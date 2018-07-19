<?php

namespace InfrontLabs\Startup\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Mail\Account\PasswordChanged;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use InfrontLabs\Startup\Requests\Account\PasswordChangeRequest;

class PasswordController extends Controller
{
    public function index()
    {
        return view('startup::account.password');
    }

    public function store(PasswordChangeRequest $request)
    {
        $request->user()->update([
            'password' => Hash::make($request->get('password')),
        ]);

        Mail::to($request->user())->send(new PasswordChanged);

        return redirect()->route('account.password')->withSuccess('Your password has been changed.');
    }
}
