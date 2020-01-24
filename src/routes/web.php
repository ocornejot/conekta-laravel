<?php

Route::group(['prefix' => 'conekta', 'namespace' => 'Ocornejo\Conekta\Http\Controllers'], function () {
    Route::post('webhook', 'ConektaController@webhook')->name('conekta.webhook');
});
