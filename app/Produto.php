<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Movimentacao;

class Produto extends Model
{
    protected $fillable = [
        'codigo_de_barras', 'descricao', 'preco','quantidade'
    ];

    public function movimentacao(){
        $this->hasMany('App\Movimentacao');
    }

    public function verificaSeExiste($id){
    	if($this->find($id)){
    		return true;
    	}else{
    		return false;
    	}
    }

    public function cadastra(){
     	$this->save();
    }
    public function deleta($id){
    	if(!$this->verificaSeExiste($id)){
            return false;
    	}else{
    		$produto = $this->find($id);
            $produto->delete();
    	}
    }
    public function lista($id){
    	if($this->verificaSeExiste($id)){
    		return $this->find($id);
    	}else{
    		return false;
    	}
    }
    public function listaTodos(){
    	if($this->all()){
    		return $this->all();
    	}else{
    		return false;
    	}
    }
    public function altera($id, $params){
        $produto = Produto::find($id);
    	$produto->update($params);
    }

    public function adicionaQuantidade($id, $quantidade){

        $produto = Produto::find($id);
        $quantidadeOld = $produto->quantidade;
        $produto->quantidade = ($quantidadeOld+$quantidade);

        $movimentacao = new Movimentacao();
        $movimentacao->produto_id = $id;
        $movimentacao->date = date('Y-m-d');
        $movimentacao->quantidade = $quantidade;
        $movimentacao->tipo = 'entrada';
        $produto->update();
        $movimentacao->save();
        // $this->verificaSeExiste($id);
        // $this->find($id);
        // $quantidadeOld = $this->quantidade;

        // $this->quantidade = ($quantidadeOld+$quantidade);

        // $this->update();

    }

    public function getProdutoCodigoDeBarras($codigoDeBarras){
        return Produto::where('codigo_de_barras',$codigoDeBarras)->get();
    }

    public function baixaQuantidade($codigoDeBarras, $quantidade, $caixaId){
        $produto = Produto::where('codigo_de_barras',$codigoDeBarras)->first();
        $quantidadeOld = $produto->quantidade;
        $produto->quantidade = ($quantidadeOld-$quantidade);

        $movimentacao = new Movimentacao();
        $movimentacao->produto_id = $produto->id;
        $movimentacao->date = date('Y-m-d');
        $movimentacao->quantidade = $quantidade;
        $movimentacao->tipo = 'saida';
        $movimentacao->caixa_id = $caixaId;
        $produto->update();
        $movimentacao->save();
    }


}
