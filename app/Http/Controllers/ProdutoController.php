<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class ProdutoController extends Controller
{
    public function index(){
        $produtos = new Produto();
        $produtos = $produtos->listaTodos();
        return view('produto.index', compact('produtos'));
    }

	public function indexCadastro(){
		return view('produto.cadastro');
	}

    public function cadastrar(Request $request){
    	$produto = new Produto();
    	$produto->codigo_de_barras = $request->input('codigodebarras');
    	$produto->descricao = $request->input('descricao');
    	$produto->cadastra();
		return redirect()->back()->with(['message' => 'Cadastrado com sucesso', 'type-message'=>'danger']);
    }

    public function indexAlteracao($id){
        if(!Produto::find($id)){
            return redirect()->back()->with(['message' => 'Produto não encontrado', 'type-message'=>'danger']);
        }
        $produto = Produto::find($id);
        return view('produto.alteracao', compact('produto'));
    }

    public function alterar(Request $request){
        $produto = new Produto();
        $produto->altera($request->id, $request->all());
        return redirect()->to('/produtos')->with(['message' => 'Alterado com sucesso', 'type-message'=>'success']);
    }
}
