@extends('layout.index')
@section('pagina', 'Produto')

@section('conteudo')

<h1 class="text-center">Cadastro de produto</h1>
<form>
	{{ csrf_field() }}
	<div class="row">
		<div class="col-md-12">
			<div class="form-group">
				<label>Cód. de barras</label>
				<input type="number" min="0" name="codigodebarras"  class="form-control border-input">
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<div class="form-group">
				<label>Descrição</label>
				<input type="input" name="codigodebarras" class="form-control border-input">
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
</form>

@endsection


