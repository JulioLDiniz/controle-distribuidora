@extends('layout.index')
@section('pagina', 'Produto')

@section('conteudo')

@if(session()->has('message'))
<script>
	$(document).ready(function() {
		demo.showNotification("{{ session()->get('type-message') }}","{{ session()->get('message') }}");
	});
</script>
@endif


<h1 class="text-center">Movimentação de produto</h1>
<form action="/movimentacao-entrada" method="post">
	{{ csrf_field() }}
	<input type="hidden" name="id" value="{{$produto->id}}">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label>Cód. de barras</label>
				<input type="number" min="0" name="codigo_de_barras"  class="form-control border-input" value="{{$produto->codigo_de_barras}}" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<div class="form-group">
				<label>Descrição</label>
				<input type="input" name="descricao" class="form-control border-input" value="{{$produto->descricao}}" readonly>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Valor</label>
				<div class="input-group">
					<span class="input-group-addon border-span" id="basic-addon1">R$</span>
					<input type="number" name="valor" class="form-control border-input" readonly>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Quantidade</label>
				<input type="number" min="0" name="quantidade"  class="form-control border-input"  required >
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group">
				<label>Tipo</label>
				<select class="form-control border-input" name="tipo" required>
					<option selected value="entrada">Entrada</option>
					<option value="saida">Saída</option>
				</select>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Data</label>
				<input type="text" name="data"  class="form-control border-input" readonly>
			</div>
		</div>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary pull-right">Salvar</button>
	</div>
</form>

@endsection