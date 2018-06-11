<?php

Route::get('/', function () {
    return view('welcome');
})->name('home');

Auth::routes();

Route::get('activate/{confirmation_token}', 'Auth\EmailConfirmationController@confirm')->name('auth.email.confirmation');
