<?php

/** Backend Account Routes */

Route::get('/account', 'Account\ProfileController@index')->name('account.profile');
Route::post('/account', 'Account\ProfileController@store')->name('account.profile.store');

Route::get('/account/settings', 'Account\SettingsController@index')->name('account.settings');
Route::post('/account/settings', 'Account\SettingsController@store');
Route::get('/account/billing', 'Account\BillingController@index')->name('account.billing');
Route::get('/account/invite', 'Account\InviteController@index')->name('account.invite');

Route::get('/account/password', 'Account\PasswordController@index')->name('account.password');
Route::post('/account/password', 'Account\PasswordController@store')->name('account.password.store');

Route::get('/account/email/resend', 'Auth\EmailConfirmationController@resend')->name('account.email.resend');

/** Account Subscription Routes */

Route::group(['middleware' => 'subscription.notcancelled'], function () {
    Route::get('/account/subscription/cancel', 'Account\SubscriptionCancelController@index')->name('account.subscription.cancel');
    Route::post('/account/subscription/cancel', 'Account\SubscriptionCancelController@process')->name('account.subscription.cancel.process');
});

Route::group(['middleware' => 'subscription.cancelled'], function () {
    Route::get('/account/subscription/resume', 'Account\SubscriptionResumeController@index')->name('account.subscription.resume');
    Route::post('/account/subscription/resume', 'Account\SubscriptionResumeController@process')->name('account.subscription.resume.process');
});

Route::group(['middleware' => 'subscription.notcancelled'], function () {
    Route::get('/account/subscription/swap', 'Account\SubscriptionSwapController@index')->name('account.subscription.swap');
});

Route::group(['middleware' => 'subscription.customer'], function () {
    Route::get('/account/subscription/card', 'Account\SubscriptionCardController@index')->name('account.subscription.card');
});

Route::group(['middleware' => 'subscription.active'], function () {
    Route::get('/account/subscription', 'Account\SubscriptionDetailsController@index')->name('account.subscription.details');
    Route::get('/app', 'Account\DashboardController@index')->name('app.dashboard');
});

Route::group(['middleware' => 'subscription.inactive'], function () {
    Route::get('/account/subscribe', 'Account\SubscriptionCreateController@index')->name('account.subscribe');
    Route::post('/account/subscribe', 'Account\SubscriptionCreateController@process')->name('account.subscribe.process');
});

/** Main Application Routes */
