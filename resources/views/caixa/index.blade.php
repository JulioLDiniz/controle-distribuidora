@extends('layout.index')
@section('titulo','Caixa')
@section('pagina', 'Caixa')
@section('conteudo')

    <h1 class="text-center">Caixa</h1>

    <div id="divCorpo"></div>
    <div class="row ">
        <div class="col-md-4 pull-right">
            <div class="form-data ">
                <label>Pagamento/Cliente</label>
                <select name="pagamento" id="pagamento" class="form-control border-input ">
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}" >{{ $cliente->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <form id="formulario" action="#">

        <div class="row">
            <div class="col-md-6">
                <div class="form-data">
                    <label>Cód. de Barras</label>
                    <input type="number" name="codigodebarras" id="codigodebarras" class="form-control border-input"
                           autofocus>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-data">
                    <label>Preço</label>
                    <input type="number" min="0.01" step="0.01" name="preco" id="preco" class="form-control border-input"  >
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-data">
                    <label>Qtd compra</label>
                    <input type="number" min="1" name="quantidadecompra" id="quantidadecompra"
                           class="form-control border-input" >
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-9">
                <div class="form-data">
                    <label>Descrição</label>
                    <input type="text" name="descricao" id="descricao" class="form-control border-input" readonly>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-data">
                    <label>Qtd em estoque</label>
                    <input type="number" name="quantidadeestoque" id="quantidadeestoque"
                           class="form-control border-input" readonly>
                </div>
            </div>
            <div class="col-md-1">
                <button type="submit" id="add" class="add ti-plus"></button>
            </div>
        </div>

    </form>


    <form>
        {{ csrf_field() }}
        <table class="table table-produtos" id="tableCarrinhoCompras">
            <thead>
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Total produto</th>
                <th>Remover</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" id="valor_total">Total compra: 0</td>
                </tr>
            </tfoot>
        </table>

    </form>
    <button id="finalizar" class="btn pull-right">Finalizar</button>

@endsection
