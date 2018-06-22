<?php

Route::get('/', function () {
    return view('welcome');
})->name('home');

Auth::routes();

Route::get('activate/{confirmation_token}', 'Auth\EmailConfirmationController@confirm')->name('auth.email.confirmation');

/* STRIPE WEBHOOKS */
Route::post(
    'stripe/webhook',
    '\App\Http\Controllers\Account\StripeWebhookController@handleWebhook'
);
