<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Auth\EmailConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailConfirmationController extends Controller
{
    public function confirm(Request $request, $token)
    {
        $token->user->confirmEmail();

        Auth::loginUsingId($token->user->id);

        return redirect()->route('account.index')->withSuccess('Email has been confirmed!');

    }

    public function resend()
    {
        Mail::to(request()->user())->send(new EmailConfirmation(request()->user()->createConfirmationToken()));

        return back()->withSuccess('Email confirmation link has been sent.');
    }
}
