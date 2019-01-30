<?php

namespace App\Http\Controllers;

use App\Dashboard;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $vendas = new Dashboard();
        $vendas = $vendas->vendasDoDia(date("Y-m-d", time()));
        return view('dashboard.index', compact('vendas'));
    }
}
