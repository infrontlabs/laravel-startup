<?php

Route::get('/', function () {
    return view('welcome');
})->name('home');

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('activate/{confirmation_token}', 'Auth\ActivationController')->name('auth.activation');
Route::get('/app/accounts', 'Account\AccountsController@index')->name('app.accounts');
