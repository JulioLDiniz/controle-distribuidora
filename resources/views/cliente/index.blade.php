@extends('layout.index')
@section('titulo', 'Cliente Listagem')
@section('pagina','Cliente')
@section('conteudo')

    @if(session()->has('message'))
        <script>
            $(document).ready(function () {
                demo.showNotification("{{ session()->get('type-message') }}", "{{ session()->get('message') }}");
            });
        </script>
    @endif

    <h1 class="text-center">Clientes</h1>
    <a href="cadastrar-cliente">
        <button class="btn btn-info pull-right">Cadastrar</button>
    </a>

    <div class="col-md-12">
        <div class="card card-plain">
            <div class="content table-responsive table-full-width">
                <table class="table table-hover">
                    <thead>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>Saldo devedor</th>
                    <th>Opções</th>
                    </thead>
                    <tbody>
                    @foreach($clientes as $cliente)
                        <tr>
                            <td>{{ $cliente->nome }}</td>
                            <td>{{ $cliente->telefone }}</td>
                            <td> R$ {{ $cliente->saldo_devedor}} </td>
                            <td>
                                <a href="/alterar-cliente-{{ $cliente->id }}" style="all: unset;"><span
                                        class="ti-pencil"></span></a>
                                <span class="ti-trash" data-toggle="modal" data-target="#modal-delete-cliente"
                                      data-id="{{ $cliente->id }}" data-nome="{{ $cliente->nome }}"></span>
                                <a href="/historico-cliente-{{ $cliente->id }}" style="all: unset;"><span
                                        class="ti-align-justify"></span></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <!-- Modal -->
                <div class="modal fade modal-margin-top" id="modal-delete-cliente" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="title"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Deseja realmente excluir?
                            </div>
                            <div class="modal-footer">
                                <form action="/deletar-cliente" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" id="id" name="id"/>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button type="submit" class="btn btn-primary">Excluir</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
