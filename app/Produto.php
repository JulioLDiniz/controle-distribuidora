<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = [
        'codigo_de_barras', 'descricao'
    ];
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

        $produto->update();
        // $this->verificaSeExiste($id);
        // $this->find($id);
        // $quantidadeOld = $this->quantidade;

        // $this->quantidade = ($quantidadeOld+$quantidade);

        // $this->update();

    }
}
