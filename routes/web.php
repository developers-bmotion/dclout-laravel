<?php

use Illuminate\Support\Facades\Route;

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
/*=============================================
LENGUAJE
=============================================*/
Route::get('set_lenguage/{lang}', 'Controller@setLanguage')->name('set_lenguage');
/*=============================================
RUTAS PARA EL PROYECTO
=============================================*/
Route::group(['namespace' => 'Project'], function () {
    Route::get('/project-submit','ProjectController@indexCreateProject')->name('index.submit.create.project');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
