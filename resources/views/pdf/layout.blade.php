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
			<h2>Relatorio de pagamentos {{$turma->semestre}}</h2>
		</div>
	</div>
	<table class="table table-striped table-bordered text-nowrap">
		<thead>
			<tr>
				<th scope="col">Nome</th>
				<th scope="col">Valor Mensal</th>
				<th scope="col">Val. Semestre</th>
				@foreach ($meses as $mes)
				<th scope="col">{{mes($mes)}}</th>
				@endforeach
				<th scope="col">Recebido</th>
				<th scope="col">Subtotal</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($alunos as $aluno)
			@if ($aluno->gradesAtual != null && $aluno->gradesAtual->creditos != 0)
			<tr class="px-2">
				@php
					$i=0
				@endphp
				<td class="px-2">{{$aluno->name}}</td>
				<td>
					@if($aluno->bolsa != null)
						{{valorBolsista($aluno->gradesAtual->creditos,$aluno->bolsa['percentual'])}}
					@else
						{{valorMensal($aluno->gradesAtual->creditos)}}
					@endif
				</td>
				<td>
					@if($aluno->bolsa != null)
						R$ {{(int)valorBolsistaDB($aluno->gradesAtual->creditos,$aluno->bolsa['percentual'])*6}},00
					@else
						R$ {{(int)valorMensalDB($aluno->gradesAtual->creditos)*6}},00
					@endif
				</td>
				@foreach($aluno->mensalidades as $mensalidade)
				@if($aluno->bolsa != null && $aluno->bolsa['percentual'] == '100')
					<td class="sym highlight">Isento</td>
				@elseif ($mensalidade->pago)
					<td class="sym text-green"><i class="far fa-check-circle"></i></td>
				@else
					<td class="sym {{\Carbon\Carbon::parse($mensalidade->data_venv) < \Carbon\Carbon::now() && $mensalidade->pago == false ?'bg-danger text-red':''}}"><i class="far fa-times-circle"></i></td>
				@endif
				@endforeach
				<td>
					{{-- contar mensalidades pagas --}}
					@foreach ($aluno->mensalidades as $mensalidade)
						@if ($mensalidade->pago)
						@php
							$i++;
						@endphp
						@endif
					@endforeach
					@if($aluno->bolsa != null)
						R${{(int)valorBolsistaDB($aluno->gradesAtual->creditos,$aluno->bolsa['percentual'])*$i}},00
					@else
						R${{(int)valorMensalDB($aluno->gradesAtual->creditos)*$i}},00
					@endif
				</td>
				<td>
					@if($aluno->bolsa != null)
						R${{((int)valorBolsistaDB($aluno->gradesAtual->creditos,$aluno->bolsa['percentual'])*6)-((int)valorBolsistaDB($aluno->gradesAtual->creditos,$aluno->bolsa['percentual'])*$i)}},00
					@else
						R${{((int)valorMensalDB($aluno->gradesAtual->creditos)*6)-((int)valorMensalDB($aluno->gradesAtual->creditos)*$i)}},00
					@endif
				</td>
			</tr>
			@endif
			@endforeach
		</tbody>
	</table>
</body>
</html>
