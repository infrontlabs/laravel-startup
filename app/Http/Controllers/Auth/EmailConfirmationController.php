<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Auth\ActivationEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EmailConfirmationController extends Controller
{
    public function confirm(Request $request, $token)
    {
        $token->user->validateAccount();

        Auth::loginUsingId($token->user->id);

        return redirect()->intended('/org')->withSuccess('Email has been confirmed!');

    }

    public function resend()
    {
        Mail::to(request()->user())->send(new ActivationEmail(request()->user()->createConfirmationToken()));

        return back()->withSuccess('Email confirmation link has been sent.');
    }
}
