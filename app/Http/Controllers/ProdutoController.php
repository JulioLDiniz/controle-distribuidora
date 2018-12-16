<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class ProdutoController extends Controller
{
	public function indexCadastro(){
		return view('produto.cadastro');
	}

    public function cadastrar(Request $request){
    	$produto = new Produto();
    	$produto->codigo_de_barras = $request->input('codigodebarras');
    	$produto->descricao = $request->input('descricao');
    	$produto->cadastra();
		return redirect()->back()->with('message', 'Cadastrado com sucesso');
    }
}
