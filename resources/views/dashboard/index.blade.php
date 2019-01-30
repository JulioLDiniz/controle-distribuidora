@extends('layout.index')
@section('pagina','Dashboard')

@section('conteudo')
    <div class="row">
        <div class="col-lg-3 col-sm-6">
            <div class="card">
                <div class="content">
                    <div class="row">
                        <div class="col-xs-5">
                            <div class="icon-big icon-success text-center">
                                <i class="ti-wallet"></i>
                            </div>
                        </div>
                        <div class="col-xs-7">
                            <div class="numbers">
                                <p>Faturado</p>
                                <span>{{ $vendas }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <hr/>
                        <div class="stats">
                            <i class="ti-calendar"></i>
                            <input type="date" style="border: 1px solid #CCC5B9; border-radius: 4px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
