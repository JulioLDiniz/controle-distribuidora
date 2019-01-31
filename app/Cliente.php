<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

    protected $fillable = [
        'nome', 'telefone', 'saldo_devedor'
    ];

    public function verificaSeExiste($id)
    {
        if ($this->find($id)) {
            return true;
        } else {
            return false;
        }
    }

    public function listaTodos()
    {
        if ($this->all()) {
            return $this->orderBy('nome','asc')->get();
        } else {
            return false;
        }
    }

    public function cadastra()
    {
        $this->save();
    }

    public function deleta($id)
    {
        if (!$this->verificaSeExiste($id)) {
            return false;
        } else {
            $cliente = $this->find($id);
            $cliente->delete();
        }
    }

    public function altera($id, $params)
    {
        $cliente = Cliente::find($id);
        $cliente->update($params);
    }

    public function registraSaldoDevedor($id, $valor)
    {
        $cliente = Cliente::find($id);
        $cliente->saldo_devedor += $valor;
        $cliente->save();
    }

    public function darBaixaSaldo($id, $valor)
    {
        $cliente = Cliente::find($id);
        $cliente->saldo_devedor -= $valor;
        $cliente->save();
    }
}
