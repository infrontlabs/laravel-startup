<?php

namespace App\Http\Controllers\Account;

use App\Account\Requests\ProfileUpdateRequest;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        return view('account.profile');
    }

    public function store(ProfileUpdateRequest $request)
    {
        $request->user()->update($request->only('first_name', 'last_name'));

        return back()->withSuccess('Your profile has been saved!');
    }
}
