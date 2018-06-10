<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Account\PasswordChangeRequest;
use Illuminate\Support\Facades\Hash;

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

        return redirect()->route('account.profile');
    }
}
