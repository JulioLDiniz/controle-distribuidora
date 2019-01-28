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

    <h1 class="text-center">Cadastro de cliente</h1>
    <form action="/cadastrar-cliente" method="post">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Nome</label>
                    <input autofocus type="text" name="nome" class="form-control border-input"
                           required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Telefone</label>
                    <input type="input" name="telefone" class="form-control border-input" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary pull-right">Cadastrar</button>
        </div>
    </form>


@endsection
