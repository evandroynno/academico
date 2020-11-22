<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{{ config('app.name', 'Laravel') }}</title>

	{{-- <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

	<!-- Styles -->
	{{-- <link href="{{public_path('css/app.css')}}" rel="stylesheet"> --}}
	{{-- <link href="{{public_path('css/main.css')}}" rel="stylesheet"> --}}
	{{-- <link href="{{public_path('css/select2.min.css')}}" rel="stylesheet"> --}}
	<style type="text/css" >
		*{
			box-sizing: border-box;
		}
		.text-nowrap {
			white-space: nowrap !important;
		}
		table, th, td {
			border: 1px solid black;
			border-collapse: collapse;
			text-align: center;
		}
		table {
			width: 100%;
			display: table;
		}
		/* td{
			border: 1px solid darkgrey;
		} */
		tr {
			display: table-row;
			line-height: 20px;
		}
		.highlight {
			background-color: brown;
			color: #fff;
			display: table-cell;
		}
		.sym{
			align-items: center;
			display: table-cell;
			width: 35px;
		}
		.sym i{
			/* margin: 4px; */
			padding-left: 10px;
			padding-top: 3px;
			/* padding-bottom: 2px; */
		}
		.text-green{
			background: greenyellow;
			color: #000;
		}
		.text-red{
			background: crimson;
			color: #000;
		}
		div{
			display: block;
		}
		.col-left{
			margin-bottom: 15px;
		}
		.col-right{
			float: right
		}
		.row{
			display: inline-table;
		}

	</style>
</head>
<body>
	<div class="row justify-content-center">
		<div class="col-left">
			{{-- <img src="http://pisdc.local/img/logo.png"> --}}
			<img src="{{public_path('img/logo.png')}}">
		</div>
		<div class="col-right">
			
		</div>
	</div>
	<h2>Relatorio de movientação de {{$mes}}/{{$ano}}</h2>
	<table class="table table-striped table-bordered text-nowrap">
		<thead>
			<tr>
				<td class="text-nowrap" scope="col">Nome</td>
				<td class="text-nowrap" scope="col">Tipo</td>
				<td class="text-nowrap" scope="col">Valor</td>
				<td class="text-nowrap" scope="col">Descrição</td>
				<td class="text-nowrap" scope="col">Data</td>
			</tr>
		</thead>
		<tbody>
		@forelse ($movs as $mov)
			<tr
			@if ($mov->tipo == 'E')
				class="text-white bg-success"
			@else
				class="text-white bg-danger"
			@endif
			>
				<td class="text-nowrap">{{$mov->nome}}</td>
				<td class="text-nowrap">
					@if ($mov->tipo == 'E')
						Entrada
					@else
						Saída
					@endif
				</td>
				<td class="text-nowrap">
					R$ {{$mov->valor}},00
				</td>
				<td class="text-nowrap">{{$mov->descricao}}</td>
				<td class="text-nowrap">{{date( 'd-m-Y' , strtotime($mov->data) )}}</td>
			</tr>
		@empty
			<tr>
				<td colspan="5"><h3>Não há registros</h3></td>
			</tr>
		@endforelse
		</tbody>
	</table>
</body>
</html>
