<?php

Route::group(['prefix' => 'conekta', 'namespace' => 'App\Http\Controllers', 'middleware' => ['web']], function () {
    Route::get('configuration', 'ConektaController@index')->name('conekta.configuration.get');
    Route::put('configuration', 'ConektaController@update')->name('conekta.configuration.update');
    Route::post('webhook', 'ConektaController@webhook')->name('conekta.webhook');
});
