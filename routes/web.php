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

Route::get('/',['as'=>'index','uses'=>'App\Http\Controllers\LoginController@home']);
//Route::get('/login/deletaexercicio/{id}',['as'=>'admin.login.deletaexercicio','uses'=>'App\Http\Controllers\Site\LoginController@deletaexercicio']);
