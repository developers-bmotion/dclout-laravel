<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/email-prueba', function (){
   return new \App\Mail\RegisterCloud\RegisterCloud('Mauricio');
});

Route::get('/data/{id}', function ($id){
   return \App\User::where('id', $id)->whereHas('clouts')->with('projects','clouts.tag', 'clouts.musicalGenres', 'clouts.categories')->get();
});

Route::get('/', function (){
   return redirect('/{locale}/register-user');
});
/*=============================================
LENGUAJE
=============================================*/
Route::get('set_lenguage/{lang}', 'Controller@setLanguage')->name('set_lenguage');
/*=============================================
RUTAS PARA LAS PAGINAS
=============================================*/

/*RUTAS PARA EL REGISTRO DE USUARIOS*/
Route::group(['prefix' => '{locale}'], function () {

    /*=============================================
        LANDING PAGG
    =============================================*/
    Route::get('/register-user','RegisterController@indexRegister')->name('index.register');

    /*==========================================================================================*
        VISTAS PARA USUARIOS AUTENTICADOS
    =============================================*=============================================*/

    /*=============================================
     VISTAS DEL PERFIL
     =============================================*/
    Route::group(['middleware' => 'auth'], function (){
        Route::get('/profile', 'UserController@indexProfile')->name('index.user.profile');
    });

    /*=============================================
     VISTAS PROYECTOS
     =============================================*/
    Route::get('/projects', 'ProjectController@indexListProjects')->name('index.list.project');


});

/*=============================================
     CONSULTAS
=============================================*/
Route::group(['prefix' => 'api'], function (){
    Route::get('/get-user-profile-clout', 'UserController@getUserProfileClout')->name('api.get.user.profile.clout');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
