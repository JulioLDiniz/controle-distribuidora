@extends('layout.index')
@section('titulo', 'Cliente Historico')
@section('pagina','Cliente')
@section('conteudo')

    @if(session()->has('message'))
        <script>
            $(document).ready(function () {
                demo.showNotification("{{ session()->get('type-message') }}", "{{ session()->get('message') }}");
            });
        </script>
    @endif

    <h1 class="text-center">Histórico de compras</h1>
    <div class="row">
        <button class="btn btn-info pull-right" data-toggle="modal" data-target="#modal-baixa-saldo"
                data-saldo-devedor="{{ $array[1]->saldo_devedor }}" data-id="{{ $array[1]->id }}">Dar baixa em saldo
            devedor
        </button>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" readonly name="nome" class="form-control border-input" value="{{ $array[1]->nome }}"
                       required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Saldo devedor</label>
                <div class="input-group">
                    <span class="input-group-addon border-span" id="basic-addon1">R$</span>
                    <input type="text" readonly name="saldo_devedor" class="form-control border-input"
                           value="{{ $array[1]->saldo_devedor }}" required>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-plain">
                <div class="content table-responsive table-full-width">
                    <table class="table table-hover">
                        <thead>
                        <th>Data</th>
                        <th>Valor</th>
                        </thead>
                        <tbody>
                        @foreach($array[0] as $venda)
                            <tr>
                                <td>{{ date("d-m-Y H:i:s",  strtotime($venda->created_at))  }}</td>
                                <td>R$ {{ $venda->valor }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade modal-margin-top" id="modal-baixa-saldo" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="title"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/dar-baixa-saldo" method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <label>Valor</label>
                        <input type="number" required min="1" max="{{ $array[1]->saldo_devedor }}" step="0.01" name="valorSaldoDevedor" class="form-control border-input"
                               id="valorSaldoDevedor">
                    </div>
                    <div class="modal-footer">

                        <input type="hidden" id="id" name="id"/>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Concluir</button>

                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection
