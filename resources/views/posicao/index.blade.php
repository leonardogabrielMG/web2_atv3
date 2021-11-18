@extends("template/web")

@section("titulo", "Cadastro de Posição de Jogador")

@section("formulario")

	<h3>Cadastro de Posição de Jogador</h3>

	<form method="POST" action="/posicao" class="row">

		@csrf
		<input type="hidden" name="id" value="{{ $posicao->id }}">

		<div class="form-group col-8">
			<label for="pPosicao">Posição: </label>
			<input type="text" name="pPosicao" class="form-control" value="{{ $posicao->pPosicao }}" required>
		</div>
		<div class="form-group col-4">
			<a href="/posicao" class="btn btn-primary bottom">
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
			<col width="200">
			<col width="80">
			<col width="80">
		</colgroup>
		<thead>
			<tr>
				<th>Posição</th>
				<th>Editar</th>
				<th>Excluir</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($posicoes as $posicao)
				<tr>
					<td>{{ $posicao->pPosicao }}</td>
					<td>
						<a href="/posicao/{{ $posicao->id }}/edit" class="btn btn-warning">
							<i class="fas fa-edit"></i>
							Editar
						</a>
					</td>
					<td>
						<form method="POST" action="/posicao/{{ $posicao->id }}">
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