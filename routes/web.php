<?php

Route::get('/', function () {
    return view('welcome');
})->name('home');

Auth::routes();

Route::get('activate/{confirmation_token}', 'Auth\EmailConfirmationController@confirm')->name('auth.email.confirmation');
Route::get('email/resend', 'Auth\EmailConfirmationController@resend')->name('auth.email.resend');

/* STRIPE WEBHOOKS */
Route::post(
    'stripe/webhook',
    '\App\Http\Controllers\Account\StripeWebhookController@handleWebhook'
);

Route::get('plans', 'PlansController@index')->name('plans.index');

Route::group(['middleware' => ['auth.register', 'subscription.inactive']], function () {
    Route::get('plans/subscribe/{plan}', 'PlansController@subscribe')->name('plans.subscribe');
});
