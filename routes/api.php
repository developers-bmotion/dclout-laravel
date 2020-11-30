<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'register'], function () {
    Route::get('/get-cloud-categories','RegisterController@getCloudCategories')->name('api.get.cloud.categories');
    Route::get('/get-cloud-tags','RegisterController@getCloudTags')->name('api.get.cloud.tags');
    Route::get('/get-cloud-music','RegisterController@getCloudMusic')->name('api.get.cloud.music');
    Route::get('/get-cloud-countries','RegisterController@getCloudCountries')->name('api.get.cloud.countries');
    Route::get('/get-cloud-cities/{countryCode}','RegisterController@getCloudCities')->name('api.get.cloud.cities');

    Route::post('/store-cloud-register', 'RegisterController@storeCloud')->name('api.tore.cloud.register');
});
