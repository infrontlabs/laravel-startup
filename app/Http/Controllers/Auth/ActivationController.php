<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivationController extends Controller
{
    public function __invoke(Request $request, $token)
    {
        $token->user->activateAccount();

        Auth::loginUsingId($token->user->id);

        return redirect()->intended('/dashboard')->withSuccess('You are now signed in.');

    }
}
