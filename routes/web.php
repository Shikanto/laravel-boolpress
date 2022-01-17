<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::namespace("Admin") //cartella dove sono le rotte del group 
    ->prefix("admin") // questo per cosa c'è subito dopo lo slash '/'
    ->name("admin.") // questa per ogni name delle rotte per esempio admin.home
    ->group(function(){
        Route::get('/', 'HomeController@index')->name('home');
        
        //Route::resource("users", "UserController");
});
