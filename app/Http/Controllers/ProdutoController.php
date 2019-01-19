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
    	$produto->preco = $request->input('preco');
    	$produto->cadastra();
		return redirect()->back()->with(['message' => 'Cadastrado com sucesso', 'type-message'=>'success']);
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
    public function deletar(Request $request){
        $produto = new Produto();
        if(!Produto::find($request->id)){
            return redirect()->back()->with(['message' => 'Produto não encontrado', 'type-message'=>'danger']);
        }else{
            $produto->deleta($request->id);
            return redirect()->to('/produtos')->with(['message' => 'Deletado com sucesso', 'type-message'=>'success']);
        }
    }

//acho que da pra melhorar passando por request e não por url 
    public function indexMovimentacao($id){
        if(!Produto::find($id)){
            return redirect()->back()->with(['message' => 'Produto não encontrado', 'type-message'=>'danger']);
        }
        $produto = Produto::find($id);
        return view('produto.movimentacao', compact('produto'));
    }

    public function movimentacaoEntrada(Request $request){
        $produto = new Produto();
        $produto->adicionaQuantidade($request->id, $request->quantidade);
        return redirect()->to('/produtos')->with(['message' => 'Alterado com sucesso', 'type-message'=>'success']);
    }
    public function produtoCodigoDeBarras($codigodebarras){
        $produto = new Produto();
        return $produto->getProdutoCodigoDeBarras($codigodebarras)[0];
    }

    public function movimentacaoSaida(Request $request){
        $produto = new Produto();
        return $request;
//        $produto->baixaQuantidade($request->codigodebarras, $request->quantidade);
        //return redirect()->to('/produtos')->with(['message' => 'Baixa dada com sucesso', 'type-message'=>'success']);
        return response()->json(['message'=>'dado baixa']);
    }
}
