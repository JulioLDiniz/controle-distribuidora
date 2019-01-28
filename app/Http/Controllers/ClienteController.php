<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = new Cliente();
        $clientes = $clientes->listaTodos();
        return view('cliente.index', compact('clientes'));
    }

    public function indexCadastro()
    {
        return view('cliente.cadastro');
    }

    public function cadastrar(Request $request)
    {
        $cliente = new Cliente();
        $cliente->nome = $request->input('nome');
        $cliente->telefone = $request->input('telefone');
        $cliente->cadastra();
        return redirect()->back()->with(['message' => 'Cadastrado com sucesso', 'type-message' => 'success']);
    }

    public function deletar(Request $request)
    {
        $cliente = new Cliente();
        if (!Cliente::find($request->id)) {
            return redirect()->back()->with(['message' => 'Cliente não encontrado', 'type-message' => 'danger']);
        } else {
            $cliente->deleta($request->id);
            return redirect()->to('/clientes')->with(['message' => 'Deletado com sucesso', 'type-message' => 'success']);
        }
    }

    public function indexAlteracao($id){
        if(!Cliente::find($id)){
            return redirect()->back()->with(['message' => 'Cliente não encontrado', 'type-message'=>'danger']);
        }
        $cliente = Cliente::find($id);
        return view('cliente.alteracao', compact('cliente'));
    }

    public function alterar(Request $request){
        $cliente = new Cliente();
        $cliente->altera($request->id, $request->all());
        return redirect()->to('/clientes')->with(['message' => 'Alterado com sucesso', 'type-message'=>'success']);
    }
}
