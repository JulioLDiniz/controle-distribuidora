<?php

namespace App;

use Faker\Provider\DateTime;
use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    public static function getProdutosMenosDeCincoItens()
    {
        $produtos = Produto::where('quantidade','<=',5)->count();

        return $produtos;
    }

    public static function vendasDoDia($date){
        $vendas = Caixa::whereDate('created_at',$date)->sum('valor');
        return $vendas;
    }
}
