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

<h1 class="text-center">Cadastro de produto</h1>
<form action="/cadastrar-produto" method="post">
	{{ csrf_field() }}
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label>Cód. de barras</label>
				<input type="number" min="0" name="codigodebarras"  class="form-control border-input" required>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<div class="form-group">
				<label>Descrição</label>
				<input type="input" name="descricao" class="form-control border-input" required>
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label>Preço</label>
				<div class="input-group">
					<span class="input-group-addon border-span" id="basic-addon1">R$</span>
					<input type="number" min="1" step="0.01" name="preco" class="form-control border-input" required>
				</div>
			</div>
		</div>
	</div>
	<div class="form-group">
		<button type="submit" class="btn btn-primary pull-right">Cadastrar</button>
	</div>
</form>

@endsection


