<?php

Route::group(['middleware' => 'email.confirmed'], function () {
    Route::get('/app', 'DashboardController@index')->name('app.dashboard');
});
