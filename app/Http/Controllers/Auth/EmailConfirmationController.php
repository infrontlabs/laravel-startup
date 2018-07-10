<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Auth\EmailConfirmation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailConfirmationController extends Controller
{
    public function confirm(Request $request, $token)
    {

        if ($token->hasExpired()) {
            return redirect()->route('login')->withError(__('auth.email_confirmation_error'));
        }

        $token->user->confirmEmail();

        return redirect()->route('login')->withSuccess(__('auth.email_confirmation_success'));

    }

    public function resend()
    {
        Mail::to(request()->user())->send(new EmailConfirmation(request()->user()->createConfirmationToken()));

        return back()->withSuccess('Email confirmation link has been sent.');
    }
}
