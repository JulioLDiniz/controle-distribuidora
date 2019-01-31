<?php

namespace App\Http\Controllers;

use App\Dashboard;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Array_;

class DashboardController extends Controller
{
    public function index() {
        $vendas = Dashboard::vendasDoDia(date("Y-m-d", time()));

        $produtoFaltaEstoque = Dashboard::getProdutosMenosDeCincoItens();

        $array = Array($vendas, $produtoFaltaEstoque);
        return view('dashboard.index', compact('array'));
    }
}
