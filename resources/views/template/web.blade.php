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
	<div class="container">
		@yield("formulario")
		@yield("tabela")
	</div>
</body>
</html>