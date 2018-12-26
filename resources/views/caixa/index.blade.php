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
		<div class="col-md-6">
			<div class="form-data">
				<label>Descrição</label>
				<input type="text" name="descricao" id="descricao" class="form-control border-input" readonly>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="form-data">
				<label>Preço</label>
				<input type="number" name="preco" id="preco" class="form-control border-input">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-data">
				<label>Qtd compra</label>
				<input type="number" min="1" name="quantidadecompra" class="form-control border-input" >
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-data">
				<label>Qtd em estoque</label>
				<input type="number" name="quantidadeestoque" id="quantidadeestoque" class="form-control border-input" readonly>
			</div>
		</div>
	</div>
	
</form>
<button id="add">Adicionar</button>

<table id="table">
	
</table>

<script type="text/javascript">
	$('#codigodebarras').keyup(function(){
		var codigodebarras = $('#codigodebarras').val();

		$.ajax({
			url: 'getProduto-'+codigodebarras,
			type: 'get',
			dataType: "json",
			success: function(data){
				$('#descricao').val(data.descricao);
				$('#preco').val(data.preco);
				$('#quantidadeestoque').val(data.quantidade);
			}

		});

		
	});
	var array = new Array();
	$('#add').click(function(){
		array.push($('#descricao').val());
		console.log(array);
		
			$('#table').append('<tr><td>'+$('#descricao').val()+'</td></tr>');
	});


</script>

@endsection