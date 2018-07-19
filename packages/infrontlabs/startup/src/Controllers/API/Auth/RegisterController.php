<?php

namespace App\Http\Controllers\API\Auth;

use InfrontLabs\Startup\Models\Account;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $userData = $request->only('first_name', 'last_name', 'email', 'password');

        $this->createUser($userData);

        return [
            'status' => 'created',
        ];

    }

    protected function createUser($data)
    {
        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->accounts()->save(Account::create([
            'name' => $user->full_name,
        ]));

        return $user;
    }
}
