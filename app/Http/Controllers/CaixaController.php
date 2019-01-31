<?php

namespace App\Http\Controllers;

use App\Caixa;
use App\Cliente;
use App\Produto;
use http\Env\Response;
use Illuminate\Http\Request;

class CaixaController extends Controller
{
    public function index(){
        $clientes = new Cliente();
        $clientes = $clientes->listaTodos();
    	return view('caixa.index', compact('clientes',$clientes));
    }

    public function venda(Request $request){
        try{
            $caixa = new Caixa();
            $caixa->registrarVenda($request->idCliente, $request->totalCompra);

            $produto = new Produto();
            foreach ($request->produtos as $prod){
                $produto->baixaQuantidade($prod['codigodebarras'], $prod['quantidade'], $caixa->id);
            }

            $cliente = new Cliente();
            $cliente->registraSaldoDevedor($request->idCliente, $request->totalCompra);

          return response()->json(['success'=> 'Venda realizada com sucesso!']);
        }catch (\Exception $e){
            return response()->json(['error'=>$e->getMessage()]);
        }
    }
}
