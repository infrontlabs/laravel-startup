<?php

Route::get('/app/accounts', 'Account\AccountsController@index')->name('app.accounts');
Route::get('/app/accounts/{account}', 'Account\AccountRedirectController')->name('account');
Route::get('/app', 'Account\DashboardController@index')->name('app.dashboard');

Route::get('/app/account/settings', 'Account\SettingsController@index')->name('app.account.settings');
Route::get('/app/account/profile', 'Account\ProfileController@index')->name('app.account.profile');
Route::get('/app/account/billing', 'Account\BillingController@index')->name('app.account.billing');
Route::get('/app/account/invite', 'Account\InviteController@index')->name('app.account.invite');
Route::get('/app/account/subscription', 'Account\SubscriptionController@index')->name('app.account.subscription');
Route::post('/app/account/subscription', 'Account\SubscriptionController@process')->name('app.account.subscription');
