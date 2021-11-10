@extends("template/web")

@section("titulo", "Cadastro Clube")

@section("formulario")

	<h3>Cadastro de Clubes</h3>

	<form method="POST" action="/clube" class="row" enctype="multipart/form-data">

		@csrf
		<input type="hidden" name="id" value="{{ $clube->id }}">

		<div class="form-group col-6">
			<label for="nomeClube">Nome Clube: </label>
			<input type="text" name="nomeClube" class="form-control" value="{{ $clube->nomeClube }}">
		</div>
		<div class="form-group col-3">
			<label for="url">Escudo Clube: </label>
			<input type="file" name="url" id="url" class="form-control" value="{{ $clube->url }}">
		</div>
		<div class="form-group col-3">
			<a href="/clube" class="btn btn-primary bottom">
				<i class="fas fa-plus"></i>
				Novo
			</a>
			<button type="submit" class="btn btn-success bottom">
				<i class="fas fa-save"></i>
				Salvar
			</button>
		</div>
	</form>

@endsection

@section("tabela")

	<h3>Lista de Posições Cadastradas</h3>
	
	<table class="table table-striped">
		<colgroup>
			<col width="120">
			<col width="120">
			<col width="60">
			<col width="60">
		</colgroup>
		<thead>
			<tr>
				<th>Nome</th>
				<th>Escudo</th>
				<th>Editar</th>
				<th>Excluir</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($clubes as $clube)
				<tr>
					<td>{{ $clube->nomeClube }}</td>
					<td>
						<img src="{{ asset($clube->url); }}" maxwidth="100" height="100">
					</td>

					<td>
						<a href="/clube/{{ $clube->id }}/edit" class="btn btn-warning">
							<i class="fas fa-edit"></i>
							Editar
						</a>
					</td>
					<td>
						<form method="POST" action="/clube/{{ $clube->id }}">
							<input type="hidden" name="_method" value="DELETE">

							@csrf

							<button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza?');">
								<i class="fas fa-trash"></i>
								Excluir
							</button>
						</form>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

@endsection