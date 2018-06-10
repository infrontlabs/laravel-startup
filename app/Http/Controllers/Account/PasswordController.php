<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\PasswordChangeRequest;
use App\Mail\Account\PasswordChanged;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PasswordController extends Controller
{
    public function index()
    {
        return view('account.password');
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
