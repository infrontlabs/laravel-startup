<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
})->name('home');

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::middleware('auth')
    ->group(function () {
        Route::get('/dashboard/{any?}', 'Dashboard\DashboardAppController@index')->where('any', '.*')->name('app');
    });

Route::get('activate/{confirmation_token}', 'Account\ActivationController')->name('account.activation');
