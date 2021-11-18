<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@yield("titulo")</title>

	<link rel="stylesheet" type="text/css" href=" {{ asset('css/bootstrap.css') }} ">
	<link rel="stylesheet" type="text/css" href=" {{ asset('css/all.css') }} ">
	<link rel="stylesheet" type="text/css" href=" {{ asset('css/custom.css') }} ">

	<script type="text/javascript" src=" {{ asset('js/jquery.js') }} "></script>
</head>
<body>
	<nav class="navbar">
  		<ul class="nav">
	    	<li class="nav-item">
	    		<a href="/jogador" class="nav-link active">Jogador</a>
	    	</li>
	    	<li class="nav-item">
	    		<a href="/clube" class="nav-link active">Clube</a>
	    	</li>
	    	<li class="nav-item">
	    		<a href="/posicao" class="nav-link active">Posição</a>
	    	</li>
	  </ul>
	  <p class="navbar-text nav-item active">Alunos: Fernando Santos e Leonardo Gabriel</p>
	</nav>

	@if (Session::get("status") == "salvo")
		<div class="alert alert-success" role="alert">
			Salvo com sucesso!
		</div>
	@endif

	@if (Session::get("status") == "excluido")
		<div class="alert alert-danger" role="alert">
			Excluido com sucesso!
		</div>
	@endif

	@if (Session::get("status") == "datainvalida")
		<div class="alert alert-danger" role="alert">
			A data informada não é válida!
		</div>
	@endif

	@if (Session::get("status") == "embranco")
		<div class="alert alert-danger" role="alert">
			Preencha TODOS os campos!
		</div>
	@endif

	<div class="container">
		@yield("formulario")
		@yield("tabela")
	</div>
</body>
</html>