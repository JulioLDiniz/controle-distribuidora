<?php

namespace App;

use Faker\Provider\DateTime;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    public function getProdutosMenosDeCincoItens()
    {
        $produtos = Produto::where('quantidade','<=',5)->get();

        return $produtos;
    }

    public function vendasDoDia($date){
        $vendas = Caixa::whereDate('created_at',$date)->sum('valor');
        return $vendas;
    }
}
