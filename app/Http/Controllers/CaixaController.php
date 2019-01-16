<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaixaController extends Controller
{
    public function index(){
        $clientes = \App\Cliente::all();
    	return view('caixa.index', compact('clientes',$clientes));
    }
}
