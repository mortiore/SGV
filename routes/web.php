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
Route::get('/entrar',['as'=>'entrar','uses'=>'App\Http\Controllers\LoginController@entrar']);
Route::get('/entrar/sair',['as'=>'sair','uses'=>'App\Http\Controllers\LoginController@sair']);

Route::get('/cliente/homecliente',['as'=>'admin.cliente.homecliente','uses'=>'App\Http\Controllers\ClienteController@home']);
Route::get('/produto/homeproduto',['as'=>'admin.produto.homeproduto','uses'=>'App\Http\Controllers\ProdutoController@home']);
Route::get('/fornecedor/homefornecedor',['as'=>'admin.fornecedor.homefornecedor','uses'=>'App\Http\Controllers\FornecedorController@home']);

//Route::get('/login/deletaexercicio/{id}',['as'=>'admin.deletaexercicio','uses'=>'App\Http\Controllers\Site\LoginController@deletaexercicio']);

Route::group(['middleware'=>'auth'], function(){

    Route::get('/dashboard',['as'=>'admin.dashboard','uses'=>'App\Http\Controllers\LoginController@dashboard']);

});
