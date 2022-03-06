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

//Cliente
Route::get('/cliente/homecliente',['as'=>'admin.cliente.homecliente','uses'=>'App\Http\Controllers\ClienteController@home']);
Route::get('/cliente/cadastracliente',['as'=>'admin.cliente.cadastracliente','uses'=>'App\Http\Controllers\ClienteController@cadastracliente']);
Route::post('/cliente/updatecliente',['as'=>'admin.cliente.updatecliente','uses'=>'App\Http\Controllers\ClienteController@updatecliente']);


//Produto
Route::get('/produto/homeproduto',['as'=>'admin.produto.homeproduto','uses'=>'App\Http\Controllers\ProdutoController@home']);
Route::get('/produto/cadastraproduto',['as'=>'admin.produto.cadastraproduto','uses'=>'App\Http\Controllers\ProdutoController@cadastraproduto']);
Route::post('/produto/updateproduto',['as'=>'admin.produto.updateproduto','uses'=>'App\Http\Controllers\ProdutoController@updateproduto']);

//Fornecedor
Route::get('/fornecedor/homefornecedor',['as'=>'admin.fornecedor.homefornecedor','uses'=>'App\Http\Controllers\FornecedorController@home']);
Route::get('/fornecedor/cadastrafornecedor',['as'=>'admin.fornecedor.cadastrafornecedor','uses'=>'App\Http\Controllers\FornecedorController@cadastrafornecedor']);
Route::post('/fornecedor/updatefornecedor',['as'=>'admin.fornecedor.updatefornecedor','uses'=>'App\Http\Controllers\FornecedorController@updatefornecedor']);


//Route::get('/login/deletaexercicio/{id}',['as'=>'admin.deletaexercicio','uses'=>'App\Http\Controllers\Site\LoginController@deletaexercicio']);

Route::group(['middleware'=>'auth'], function(){

    Route::get('/dashboard',['as'=>'admin.dashboard','uses'=>'App\Http\Controllers\LoginController@dashboard']);

});
