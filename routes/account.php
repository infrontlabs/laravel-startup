<?php

/** Backend Account Routes */

Route::get('/orgs/{account}', 'Account\AccountRedirectController')->name('org.switch');

Route::get('/account', 'Account\ProfileController@index')->name('account.index');
Route::post('/account', 'Account\ProfileController@store')->name('account.profile.store');

Route::get('/account/org/settings', 'Account\SettingsController@index')->name('account.org.settings');
Route::post('/account/org/settings', 'Account\SettingsController@store');
Route::get('/account/org/billing', 'Account\BillingController@index')->name('account.org.billing');
Route::get('/account/org/team', 'Account\TeamController@index')->name('account.org.team');
Route::post('/account/org/team', 'Account\TeamController@invite')->name('account.org.team.invite');
Route::get('/account/org/team/invite/resend/{teamInvite}', 'Account\TeamController@resendInvite')->name('account.org.team.invite.resend');

Route::get('/accounts', 'Account\ManageAccountsController@index')->name('accounts');
Route::post('/accounts', 'Account\ManageAccountsController@store')->name('accounts.store');

Route::get('/account/password', 'Account\PasswordController@index')->name('account.password');
Route::post('/account/password', 'Account\PasswordController@store')->name('account.password.store');

Route::get('/account/email/resend', 'Auth\EmailConfirmationController@resend')->name('account.email.resend');

Route::get('/account/user/invites', 'Account\UserInvitesController@index')->name('account.user.invites');
Route::get('/account/user/invites/accept/{teamInvite}', 'Account\UserInvitesController@accept')->name('account.user.invites.accept');

/** Account Subscription Routes */

Route::group(['middleware' => 'subscription.notcancelled'], function () {
    Route::get('/account/org/subscription/cancel', 'Account\SubscriptionCancelController@index')->name('account.org.subscription.cancel');
    Route::post('/account/org/subscription/cancel', 'Account\SubscriptionCancelController@process')->name('account.org.subscription.cancel.process');
});

Route::group(['middleware' => 'subscription.cancelled'], function () {
    Route::get('/account/org/subscription/resume', 'Account\SubscriptionResumeController@index')->name('account.org.subscription.resume');
    Route::post('/account/org/subscription/resume', 'Account\SubscriptionResumeController@process')->name('account.org.subscription.resume.process');
});

Route::group(['middleware' => 'subscription.notcancelled'], function () {
    Route::get('/account/org/subscription/swap', 'Account\SubscriptionSwapController@index')->name('account.org.subscription.swap');
    Route::post('/account/org/subscription/swap', 'Account\SubscriptionSwapController@store')->name('account.org.subscription.swap.store');
});

Route::group(['middleware' => 'subscription.customer'], function () {
    Route::get('/account/org/subscription/card', 'Account\SubscriptionCardController@index')->name('account.org.subscription.card');
    Route::post('/account/org/subscription/card', 'Account\SubscriptionCardController@store')->name('account.org.subscription.card.store');
});

Route::group(['middleware' => 'subscription.active'], function () {
    Route::get('/account/org/subscription', 'Account\SubscriptionDetailsController@index')->name('account.org.subscription.details');
});

Route::group(['middleware' => 'subscription.inactive'], function () {
    Route::get('/account/org/subscribe', 'Account\SubscriptionCreateController@index')->name('account.org.subscribe');
    Route::post('/account/org/subscribe', 'Account\SubscriptionCreateController@process')->name('account.org.subscribe.process');
});

/** Main Application Routes */
