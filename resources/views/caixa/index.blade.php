@extends('layout.index')
@section('conteudo')

<h1 class="text-center">Caixa</h1>

<form id="formulario">
	<div class="row">
		<div class="col-md-6">
			<div class="form-data">
				<label>Cód. de Barras</label>
				<input type="number" name="codigodebarras" id="codigodebarras" class="form-control border-input" autofocus>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-data">
				<label>Preço</label>
				<input type="number" name="preco" id="preco" class="form-control border-input">
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-data">
				<label>Qtd compra</label>
				<input type="number" min="1" name="quantidadecompra" id="quantidadecompra" class="form-control border-input" >
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
				<input type="number" name="quantidadeestoque" id="quantidadeestoque" class="form-control border-input" readonly>
			</div>
		</div>
		<div class="col-md-1">
			<button type="button" id="add" class="add ti-plus"></button>
		</div>
	</div>
	
</form>


<form >
	{{ csrf_field() }}
	<table class="table table-produtos" id="tableCarrinhoCompras">
		<tr>
			<th>Produto</th>
			<th>Quantidade</th> 
			<th>Remover</th>
		</tr>
	</table>
	
	<!-- <button type="submit" id="finalizar">finalizar</button> -->
</form>





@endsection