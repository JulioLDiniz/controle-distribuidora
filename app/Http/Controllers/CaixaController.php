<?php

namespace App\Http\Controllers;

use App\Caixa;
use App\Produto;
use Illuminate\Http\Request;

class CaixaController extends Controller
{
    public function index(){
        $clientes = \App\Cliente::all();
    	return view('caixa.index', compact('clientes',$clientes));
    }

    public function venda(Request $request){
        try{
            $caixa = new Caixa();
            $caixa->registrarVenda($request->idCliente, $request->totalCompra);
            
            $produto = new Produto();
            foreach ($request->produtos as $prod)
                $produto->baixaQuantidade($prod->codigoDeBarras, $prod->quantidade, $caixa->id);

            return 'ok';
        }catch (\Exception $e){
            return $e->getMessage();
        }
    }
}
