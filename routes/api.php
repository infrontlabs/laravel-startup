<?php

use App\Http\Resources\User as UserResource;
use Illuminate\Http\Request;

Route::post('register', 'API\Auth\RegisterController@register');
Route::post('login', 'API\Auth\LoginController@login');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    // $request->user()->token()->revoke();
    return new UserResource($request->user());
});
