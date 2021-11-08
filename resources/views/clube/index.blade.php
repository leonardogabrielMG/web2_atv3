@extends("template/web")

@section("titulo", "Cadastro Clube")

@section("formulario")

	<h3>Cadastro de Clubes</h3>

	<form method="POST" action="/clube" class="row">

		@csrf
		<input type="hidden" name="id">

		<div class="form-group col-5">
			<label for="nomeClube">Nome Clube: </label>
			<input type="text" name="nomeClube" class="form-control">
		</div>
		<div class="form-group col-4">
			<label for="escudoClube">Escudo Clube: </label>
			<input type="file" name="escudoClube" class="form-control">
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
				<th>Escudo</th>
				<th>Nome</th>
				<th>Editar</th>
				<th>Excluir</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td></td>
				<td></td>

				<td>
					<a href="/clube/id/edit" class="btn btn-warning">
						<i class="fas fa-edit"></i>
						Editar
					</a>
				</td>
				<td>
					<form method="POST" action="/clube/id">
						<input type="hidden" name="_method" value="DELETE">

						@csrf

						<button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza?);'">
							<i class="fas fa-trash"></i>
							Excluir
						</button>
					</form>
				</td>
			</tr>
		</tbody>
	</table>

@endsection