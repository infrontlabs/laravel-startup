<?php

/** Backend Account Routes */

Route::get('/account', 'Account\ProfileController@index')->name('app.account.profile');
Route::get('/account/settings', 'Account\SettingsController@index')->name('app.account.settings');
Route::get('/account/billing', 'Account\BillingController@index')->name('app.account.billing');
Route::get('/account/invite', 'Account\InviteController@index')->name('app.account.invite');
Route::get('/account/subscription', 'Account\SubscriptionController@index')->name('app.account.subscription');
Route::post('/account/subscription', 'Account\SubscriptionController@process')->name('app.account.subscription');

/** Main Application Routes */

Route::get('/app', 'Account\DashboardController@index')->name('app.dashboard');
