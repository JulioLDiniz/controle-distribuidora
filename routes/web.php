<?php

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
use App\Produto;

Route::get('/', function () {
    return view('layout.index');
});

Route::get('teste', function(){
	// $mytime = Carbon\Carbon::now();
	// return $mytime->toDateString();
	$ldate = date('Y-m-d');
	return date('Y-m-d');
});
Route::get('/produtos', 'ProdutoController@index');

Route::post('/cadastrar-produto', 'ProdutoController@cadastrar');
Route::get('/cadastrar-produto', 'ProdutoController@indexCadastro');

Route::post('/alterar-produto', 'ProdutoController@alterar');
Route::get('/alterar-produto-{id}', 'ProdutoController@indexAlteracao' );

Route::post('/deletar-produto', 'ProdutoController@deletar');
Route::get('/movimentacao-{id}', 'ProdutoController@indexMovimentacao');
Route::post('/movimentacao-entrada', 'ProdutoController@movimentacaoEntrada');


//Caixa
Route::get('/caixa', 'CaixaController@index');
Route::get('/getProduto-{codigodebarras}', 'ProdutoController@produtoCodigoDeBarras');
Route::post('/postProduto',function(){
	dd(request()->descricao);
});