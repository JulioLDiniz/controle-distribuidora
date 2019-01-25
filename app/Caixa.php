<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caixa extends Model
{


    public function registrarVenda($idCliente, $valor){
        $this->cliente_id = $idCliente;
        $this->valor = $valor;
        $this->save();
    }
}
