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
    	if($this->verificaSeExiste($id)){
    		$this->delete($id);
    	}else{
    		return false;
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
}
