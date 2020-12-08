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
    Route::get('/get-cloud-categories','RegisterController@getCloutCategories')->name('api.get.cloud.categories');
    Route::get('/get-cloud-tags','RegisterController@getCloutTags')->name('api.get.cloud.tags');
    Route::get('/get-cloud-music','RegisterController@getCloutMusic')->name('api.get.cloud.music');
    Route::get('/get-cloud-countries','RegisterController@getCloutCountries')->name('api.get.cloud.countries');
    Route::get('/get-cloud-cities/{countryCode}','RegisterController@getCloutCities')->name('api.get.cloud.cities');

    Route::post('/store-cloud-register', 'RegisterController@storeClout')->name('api.store.cloud.register');
});

Route::group(['prefix' => 'profile'], function () {
    Route::get('/get-user-profile-clout', 'UserController@getUserProfileClout')->name('api.get.user.profile.clout');
});

Route::group(['prefix' => 'projects'], function () {
    Route::get('/get-list-projects','ProjectController@getListProjects')->name('api.get.list.projects');
});
