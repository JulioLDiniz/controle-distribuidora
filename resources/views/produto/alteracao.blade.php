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

<h1 class="text-center">Alteração de produto</h1>
<form action="/alterar-produto" method="post">
	{{ csrf_field() }}
	<input type="hidden" name="id" value="{{$produto->id}}">
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label>Cód. de barras</label>
				<input type="number" min="0" name="codigo_de_barras"  class="form-control border-input" value="{{$produto->codigo_de_barras}}" required>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<div class="form-group">
				<label>Descrição</label>
				<input type="input" name="descricao" class="form-control border-input" value="{{$produto->descricao}}" required>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Valor</label>
				<div class="input-group">
					<span class="input-group-addon border-span" id="basic-addon1">R$</span>
					<input type="number" disabled name="valor" class="form-control border-input">
				</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary pull-right">Alterar</button>
	</div>
</form>

@endsection

