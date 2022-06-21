<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale() . '/vendor',
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','isVendor'],
    ], function(){ //...
        Route::get('profile/{type}/{id}','Site\ProfileController@index')->name('profile-index');
        Route::resource('profile','Site\ProfileController');
        Route::post('getProductSections','Site\ProductController@getProductSections')->name('getProductSections');
        Route::post('getDistricts','Site\ProductController@getDistricts')->name('getDistricts');
});


