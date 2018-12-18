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

<h1 class="text-center">Produtos</h1>

<div class="col-md-12">
	<div class="card card-plain">
		<div class="content table-responsive table-full-width">
			<table class="table table-hover">
				<thead>
					<th>Código de barras</th>
					<th>Descrição</th>
					<th>Valor</th>
					<th>Quantidade</th>
					<th>Opções</th>
				</thead>
				<tbody>
					@foreach($produtos as $produto)
					<tr>
						<td>{{ $produto->codigo_de_barras }}</td>
						<td>{{ $produto->descricao }}</td>
						<td> $ </td>
						<td> Qtd </td>
						<td>
							<a href="/alterar-produto-{{ $produto->id }}"><span class="ti-pencil"></span></a>
							<span class="ti-trash" data-toggle="modal" data-target="#exampleModal"></span>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<!-- Modal -->
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="false">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							...
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="button" class="btn btn-primary">Save changes</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection