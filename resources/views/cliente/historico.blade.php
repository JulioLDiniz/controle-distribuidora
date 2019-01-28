@extends('layout.index')

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
        <a href="baixa-saldo-devedor">
            <button class="btn btn-info pull-right">Dar baixa em saldo devedor</button>
        </a>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label>Nome</label>
                <input type="text" readonly name="nome" class="form-control border-input" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label>Saldo devedor</label>
                <div class="input-group">
                    <span class="input-group-addon border-span" id="basic-addon1">R$</span>
                    <input type="text" readonly name="saldo_devedor" class="form-control border-input" required>
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
                        @foreach($vendas as $venda)
                            <tr>
                                <td>{{ $venda->created_at }}</td>
                                <td>{{ $venda->valor }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection
