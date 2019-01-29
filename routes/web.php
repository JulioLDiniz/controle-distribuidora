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
//	echo date('d/m/Y \à\s H:i:s');
    echo date("Y-m-d H:i:s", time());
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
//Route::post('/movimentacao-saida','ProdutoController@movimentacaoSaida');
Route::post('/venda','CaixaController@venda');

//Cliente
Route::get('/clientes','ClienteController@index');
Route::get('/cadastrar-cliente','ClienteController@indexCadastro');
Route::post('/cadastrar-cliente', 'ClienteController@cadastrar');
Route::post('/deletar-cliente', 'ClienteController@deletar');
Route::get('/alterar-cliente-{id}', 'ClienteController@indexAlteracao' );
Route::post('/alterar-cliente', 'ClienteController@alterar');
Route::get('/historico-cliente-{id}', 'ClienteController@indexHistorico' );
Route::post('/dar-baixa-saldo', 'ClienteController@darBaixaSaldo' );


Route::get('/vendas', function () {
    $vendas = new \App\Dashboard();
    return $vendas->vendasDoDia('2019-01-25 17:16:03');
});
