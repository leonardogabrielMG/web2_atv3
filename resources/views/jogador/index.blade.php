@extends("template/web")

@section("titulo", "Cadastro de Jogador")

@section("formulario")

	<h3>Cadastro de Jogador</h3>

	<form method="POST" action="/jogador" class="row">

		@csrf
		<input type="hidden" name="id" value="{{ $jogador->id }}">

		<div class="form-group col-6">
			<label for="nomeJogador">Nome: </label>
			<input type="text" name="nomeJogador" class="form-control" value="{{ $jogador->nomeJogador }}" required>
		</div>
		<div class="form-group col-6">
			<label for="dataNascimento">Data Nascimento: </label>
			<input type="date" name="dataNascimento" class="form-control" value="{{ $jogador->dataNascimento }}" required>
		</div>
		<div class="form-group col-6">
			<label for="clube">Clube: </label>
			<select name="clube" class="form-control" value="{{ $jogador->clube }}" required>
				<option></option>
				@foreach ($clubes as $clube)
					@if ($clube->id == $jogador->clube)
						<option value="{{ $clube->id }}" selected="selected">
							{{$clube->nomeClube}}
						</option>
					@else
						<option value="{{ $clube->id }}">
							{{$clube->nomeClube}}
						</option>
					@endif
				@endforeach
			</select>
		</div>
		<div class="form-group col-6">
			<label for="posicao">Posicao: </label>
			<select name="posicao" class="form-control" value="{{ $jogador->posicao }}" required>
				<option></option>
				@foreach ($posicoes as $posicao)
					@if ($posicao->id == $jogador->posicao)
							<option value="{{ $posicao->id }}" selected="selected">
								{{ $posicao->pPosicao }}
							</option>
						@else
							<option value="{{ $posicao->id }}">
								{{ $posicao->pPosicao }}
							</option>
						@endif
				@endforeach
			</select>
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
		</colgroup>
		<thead>
			<tr>
				<th>Nome</th>
				<th>Data Nascimento</th>
				<th>Escudo</th>
				<th>Posição</th>
				<th>Editar</th>
				<th>Excluir</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($jogadors as $jogador)
				<tr>
					<td>{{ $jogador->nomeJogador }}</td>
					 <td>{{ date( 'd/m/Y' , strtotime($jogador->dataNascimento))}}</td>
					<td>
						<img src="{{ asset($jogador->clube); }}" maxwidth="50" height="50">
					</td>
					<td>{{ $jogador->posicao }}</td>
					<td>
						<a href="/jogador/{{ $jogador->id }}/edit" class="btn btn-warning">
							<i class="fas fa-edit"></i>
							Editar
						</a>
					</td>
					<td>
						<form method="POST" action="/jogador/{{ $jogador->id }}">
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