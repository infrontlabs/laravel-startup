<?php

namespace App\Http\Controllers\Account;

use App\Account\Requests\ProfileUpdateRequest;
use App\Events\Auth\UserChangedEmail;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        return view('account.profile');
    }

    public function store(ProfileUpdateRequest $request)
    {
        // if user is changing email, send validation email first.
        $email = $request->get('email');
        $oldEmail = $request->user()->email;

        $request->user()->update($request->only('first_name', 'last_name', 'email'));
        if ($email !== $oldEmail) {
            $request->user()->update(['email_confirmed' => false]);
            $request->session()->flash('emailChanged', 'Please check your email to confirm your new email address.');
            event(new UserChangedEmail($request->user()));
        }

        return back()->withSuccess('Your profile has been saved!');
    }
}
