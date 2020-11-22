<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>{{config('app.name')}}</title>
	<!-- Styles -->
	{{-- <link href="{{public_path('css/app.css')}}" rel="stylesheet"> --}}
	{{-- <link href="{{public_path('css/main.css')}}" rel="stylesheet"> --}}

	<style>
	*{
		font-size: 9pt;
	}
	table{
		border: 1px solid black;
		border-collapse: collapse;
		width: 100%;
	}
	th, td{
		border: 1px solid black;
		border-collapse: collapse;
	}
	th, td.num{
		text-align: center;
	}
	h2{
		font-size: 16px;
	}
	h3{
		font-size: 14px;
	}
	div.col-7{
		text-align: center
	}
	div.col-6 img{
		width: 30%;
	}
	.row{
		display: inline-table;
	}

	.right{
		text-align: right;
	}
	.w-50{
		width: 50%;
	}
	.col-left{
		font-size: 15px;
	}
	.text-capitalize {
		text-transform: capitalize !important;
	}
	.col-right{
		float: right;
		font-size: 15px;
	}

	</style>
</head>
<body>
	<div class="row">
		<div class="col-6">
			<img src="{{public_path('img/logo.png')}}">
		</div>
	</div>
	<div class="col-7">
		<h3>Curso de Mestrado em Direito Canônico</h3>
		<h2>Historico</h2>
	</div>
	<div class="row justify-content-center">
		<div class="col-left">Nome: {{$aluno->name}}</div>
		<div class="col-right">Matricula {{$aluno->matricula}}</div>
	</div>
	<table class="table table-sm table-striped table-bordered">
		<thead>
			<tr>
				<th>Código</th>
				<th>Disciplina</th>
				<th>CR</th>
				<th>Nota</th>
				<th>COF/CRD</th>
			</tr>
			<tbody>
				@foreach($disciplinas as $disciplina)
				<tr>
					<td>{{$disciplina->cod}}</td>
					<td>{{$disciplina->name}}</td>
					<td class="num">{{ number_format($disciplina->creditos,2,'.',',')}}</td>
					<td class="num">{{isset($aluno->notas->where('disciplina_id',$disciplina->id)->first()->notaFinal)? $aluno->notas->where('disciplina_id',$disciplina->id)->first()->notaFinal:''}}</td>
					<td class="text-capitalize">{{isset($aluno->notas->where('disciplina_id',$disciplina->id)->first()->status)? $aluno->notas->where('disciplina_id',$disciplina->id)->first()->status:'Não Cursado'}}</td>
				</tr>
				@endforeach
			</tbody>
		</thead>
	</table>
	<br>
	<table class="table table-sm table-striped table-bordered">
		<tr>
			<th class="w-50">MÉDIA GERAL</th>
			<td></td>
		</tr>
		<tr>
			<th class="w-50">MÉDIA DE UNIVERSO IURE</th>
			<td></td>
		</tr>
		<tr>
			<th class="w-50">DISSERTATIO AD LICENTIAM</th>
			<td></td>
		</tr>
		<tr>
			<th class="w-50">MÉDIA FINAL</th>
			<td></td>
		</tr>
	</table>
	<span class="col-right">Rio de Janeiro, {{\Carbon\Carbon::now()->format("d/M/Y")}}</span>
</body>
</html>
