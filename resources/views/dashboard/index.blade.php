@extends('layout.index')
@section('pagina','Dashboard')

@section('conteudo')
    <div class="row">
        <div class="container">
            <div class="col-lg-4 col-sm-6 col-md-4">
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
                                    R$<span id="venda"> {{ $array[0] }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr/>
                            <div class="stats">
                                <i class="ti-calendar"></i>
                                <input type="date" id="venda-date"
                                       style="border: 1px solid #CCC5B9; border-radius: 4px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6 col-md-4">
                <div class="card">
                    <div class="content">
                        <div class="row">
                            <div class="col-xs-5">
                                <div class="icon-big icon-danger text-center">
                                    <i class="ti-alert"></i>
                                </div>
                            </div>
                            <div class="col-xs-7">
                                <div class="numbers">
                                    <p>Atenção no estoque</p>
                                    <span id="produto">{{ $array[1]}} </span>
                                </div>
                            </div>
                        </div>
                        <div class="footer">
                            <hr/>
                            <div class="stats">
                                <i>Não deixe faltar produtos em estoque :)</i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
