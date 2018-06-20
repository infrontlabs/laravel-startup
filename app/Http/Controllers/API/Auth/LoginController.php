<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('api');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);

        if ($this->attemptLogin($request)) {
            return $this->authTokenResponse($request);
        }

        return response()->json([
            'message' => 'Login failed',
        ], 401);

    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'email';
    }

    /**
     * Attempt to log the user into the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request), $request->filled('remember')
        );
    }

    /* Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('web');
    }

    protected function authTokenResponse($data)
    {
        $params = [
            'grant_type' => 'password',
            'client_id' => '1',
            'client_secret' => 'Z9lSteAehPSaXbfaTo6UZW8HxPuVA9Sn2z1wbkmo',
            'username' => $data['email'],
            'password' => $data['password'],
        ];

        $request = Request::create('/oauth/token', 'POST', $params);
        return app()->handle($request);

    }
}
