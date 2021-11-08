@extends("template/web")

@section("titulo", "Cadastro de Jogador")

@section("formulario")

	<h3>Cadastro de Jogador</h3>

	<form method="POST" action="/jogador" class="row">

		@csrf
		<input type="hidden" name="id">

		<div class="form-group col-6">
			<label for="nome">Nome: </label>
			<input type="text" name="nome" class="form-control">
		</div>
		<div class="form-group col-6">
			<label for="dataNascimento">Data Nascimento: </label>
			<input type="date" name="dataNascimento" class="form-control">
		</div>
		<div class="form-group col-6">
			<label for="clubeJogador">Clube: </label>
			<select name="clubeJogador" class="form-control"></select>
		</div>
		<div class="form-group col-6">
			<label for="posicaoJogador">Posicao: </label>
			<select name="posicaoJogador" class="form-control"></select>
		</div>
		<div class="form-group col-6">
			<label for="colecao">Faz parte da coleção? </label>
			<INPUT TYPE="checkbox" NAME="sim" VALUE="op1" class="form-control"> Sim
			<INPUT TYPE="checkbox" NAME="nao" VALUE="op2" class="form-control"> Não

		</div>
		<div class="form-group col-6">
			<a href="/jogador" class="btn btn-primary bottom">
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
			<col width="100">
			<col width="120">
			<col width="140">
			<col width="80">
			<col width="30">
			<col width="30">
			<col width="30">
		</colgroup>
		<thead>
			<tr>
				<th>Escudo</th>
				<th>Posição</th>
				<th>Nome</th>
				<th>Data Nascimento</th>
				<th>Editar</th>
				<th>Excluir</th>
				<th>Adquirir</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>
					<a href="/jogador/id/edit" class="btn btn-warning">
						<i class="fas fa-edit"></i>
						Editar
					</a>
				</td>
				<td>
					<form method="POST" action="/jogador/id">
						<input type="hidden" name="_method" value="DELETE">

						@csrf

						<button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza?);'">
							<i class="fas fa-trash"></i>
							Excluir
						</button>
					</form>
				</td>
				<td></td>
			</tr>
		</tbody>
	</table>

@endsection