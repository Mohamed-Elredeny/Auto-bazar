<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/maintenance',
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','isMaintenance'],
    ], function(){ //...

    Route::get('profile/{type}/{id}','Site\ProfileController@index')->name('profile-index');
    Route::resource('profile','Site\ProfileController');
    Route::post('getDistricts','Site\ProductController@getDistricts')->name('getDistricts');

});
