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

Route::get('/interno',['as'=>'index','uses'=>'App\Http\Controllers\LoginController@home']);
Route::get('/entrar',['as'=>'entrar','uses'=>'App\Http\Controllers\LoginController@entrar']);
Route::get('/entrar/sair',['as'=>'sair','uses'=>'App\Http\Controllers\LoginController@sair']);
Route::get('/criaadm',['as'=>'criaadm','uses'=>'App\Http\Controllers\LoginController@criaadm']);

//Site
Route::get('/',['as'=>'ecommerce.dash','uses'=>'App\Http\Controllers\EcommerceController@dash']);
Route::get('/login',['as'=>'ecommerce.login','uses'=>'App\Http\Controllers\EcommerceController@login']);
Route::get('/cadastro',['as'=>'ecommerce.cadastro','uses'=>'App\Http\Controllers\EcommerceController@cadastro']);
Route::post('/updatecliente',['as'=>'ecommerce.updatecliente','uses'=>'App\Http\Controllers\EcommerceController@updatecliente']);
Route::get('/entrar/cliente',['as'=>'entrar.cliente','uses'=>'App\Http\Controllers\EcommerceController@entrar']);
Route::get('/entrar/cliente/sair',['as'=>'sair.cliente','uses'=>'App\Http\Controllers\EcommerceController@sair']);
Route::post('/site/validacao/{id}',['as'=>'ecommerce.validacao','uses'=>'App\Http\Controllers\EcommerceController@validacao']);


Route::get('/site/recuperasenha',['as'=>'ecommerce.recuperasenha','uses'=>'App\Http\Controllers\EcommerceController@recuperasenha']);
Route::post('/site/validaemail',['as'=>'ecommerce.validaemail','uses'=>'App\Http\Controllers\EcommerceController@validaemail']);
Route::post('/site/validasenha/{id}',['as'=>'ecommerce.validasenha','uses'=>'App\Http\Controllers\EcommerceController@validasenha']);

Route::get('/site/visualizaproduto/{id}',['as'=>'ecommerce.visualizaproduto','uses'=>'App\Http\Controllers\EcommerceController@visualizaproduto']);

Route::get('/site/carrinho',['as'=>'ecommerce.carrinho','uses'=>'App\Http\Controllers\EcommerceController@carrinho']);
Route::get('/site/fechamentoitens',['as'=>'ecommerce.fechamentoitens','uses'=>'App\Http\Controllers\EcommerceController@fechamentoitens']);

Route::get('/site/adicionacarrinho/{id}',['as'=>'ecommerce.adicionacarrinho','uses'=>'App\Http\Controllers\EcommerceController@adicionacarrinho']);


Route::get('/politica/privacidade',['as'=>'ecommerce.privacidade','uses'=>'App\Http\Controllers\EcommerceController@privacidade']);
Route::get('/politica/termosdeuso',['as'=>'ecommerce.termosdeuso','uses'=>'App\Http\Controllers\EcommerceController@termosdeuso']);
Route::get('/politica/quemsomos',['as'=>'ecommerce.quemsomos','uses'=>'App\Http\Controllers\EcommerceController@quemsomos']);
Route::get('/politica/trocasedevolucoes',['as'=>'ecommerce.trocasedevolucoes','uses'=>'App\Http\Controllers\EcommerceController@trocasedevolucoes']);

Route::get('/contato',['as'=>'ecommerce.contato','uses'=>'App\Http\Controllers\EcommerceController@contato']);
Route::get('/contato/enviar',['as'=>'ecommerce.contatoenviar','uses'=>'App\Http\Controllers\EcommerceController@contatoenviar']);

//Cliente
Route::get('/cliente/homecliente',['as'=>'admin.cliente.homecliente','uses'=>'App\Http\Controllers\ClienteController@home']);
Route::get('/cliente/cadastracliente',['as'=>'admin.cliente.cadastracliente','uses'=>'App\Http\Controllers\ClienteController@cadastracliente']);
Route::post('/cliente/updatecliente',['as'=>'admin.cliente.updatecliente','uses'=>'App\Http\Controllers\ClienteController@updatecliente']);

Route::get('/cliente/editacliente/{id}',['as'=>'admin.cliente.editacliente','uses'=>'App\Http\Controllers\ClienteController@editacliente']);
Route::put('/cliente/atualizacliente/{id}',['as'=>'admin.cliente.atualizacliente','uses'=>'App\Http\Controllers\ClienteController@atualizacliente']);
Route::get('/cliente/deletacliente/{id}',['as'=>'admin.cliente.deletacliente','uses'=>'App\Http\Controllers\ClienteController@deletacliente']);

//Produto
Route::get('/produto/homeproduto',['as'=>'admin.produto.homeproduto','uses'=>'App\Http\Controllers\ProdutoController@home']);
Route::get('/produto/cadastraproduto',['as'=>'admin.produto.cadastraproduto','uses'=>'App\Http\Controllers\ProdutoController@cadastraproduto']);
Route::post('/produto/updateproduto',['as'=>'admin.produto.updateproduto','uses'=>'App\Http\Controllers\ProdutoController@updateproduto']);

Route::get('/produto/editaproduto/{id}',['as'=>'admin.produto.editaproduto','uses'=>'App\Http\Controllers\ProdutoController@editaproduto']);
Route::put('/produto/atualizaproduto/{id}',['as'=>'admin.produto.atualizaproduto','uses'=>'App\Http\Controllers\ProdutoController@atualizaproduto']);
Route::get('/produto/deletaproduto/{id}',['as'=>'admin.produto.deletaproduto','uses'=>'App\Http\Controllers\ProdutoController@deletaproduto']);

//Fornecedor
Route::get('/fornecedor/homefornecedor',['as'=>'admin.fornecedor.homefornecedor','uses'=>'App\Http\Controllers\FornecedorController@home']);
Route::get('/fornecedor/cadastrafornecedor',['as'=>'admin.fornecedor.cadastrafornecedor','uses'=>'App\Http\Controllers\FornecedorController@cadastrafornecedor']);
Route::post('/fornecedor/updatefornecedor',['as'=>'admin.fornecedor.updatefornecedor','uses'=>'App\Http\Controllers\FornecedorController@updatefornecedor']);

Route::get('/fornecedor/editafornecedor/{id}',['as'=>'admin.fornecedor.editafornecedor','uses'=>'App\Http\Controllers\FornecedorController@editafornecedor']);
Route::put('/fornecedor/atualizafornecedor/{id}',['as'=>'admin.fornecedor.atualizafornecedor','uses'=>'App\Http\Controllers\FornecedorController@atualizafornecedor']);
Route::get('/fornecedor/deletafornecedor/{id}',['as'=>'admin.fornecedor.deletafornecedor','uses'=>'App\Http\Controllers\FornecedorController@deletafornecedor']);

//Segurança
Route::get('/entrar/mudasenha/',['as'=>'admin.mudasenha','uses'=>'App\Http\Controllers\LoginController@mudasenha']);
Route::put('/entrar/atualizasenha/{id}',['as'=>'admin.atualizasenha','uses'=>'App\Http\Controllers\LoginController@atualizasenha']);


//Route::get('/login/deletaexercicio/{id}',['as'=>'admin.deletaexercicio','uses'=>'App\Http\Controllers\Site\LoginController@deletaexercicio']);

Route::group(['middleware'=>'auth'], function(){

    Route::get('/dashboard',['as'=>'admin.dashboard','uses'=>'App\Http\Controllers\LoginController@dashboard']);

});
