@extends('professor.layout.professor')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-10">
			<form action="{{route('professor.salvarPresenca')}}" method="post">
				@csrf
				<card titulo='Lista de Presença' i='fas fa-users' cor="bg-nav" submit="Salvar" voltar="{{route('professor.home')}}">
					<div class="row mb-2">
						<div class="col-md-6">
							<strong>Disciplina:</strong> {{$disciplina->name}} <input type="hidden" name="disciplina" id="disciplina" value="{{$disciplina->cod}}" >
						</div>
						<div class="col-md-6">
							<strong>Data:</strong> {{\Carbon\Carbon::parse($data)->format('d/m/Y')}}
							<input type="hidden" name="data" value="{{$data}}">
						</div>
					</div>
					<table class="table table-sm-responsive text-nowrap w-100">
						<thead>
							<th>Aluno</th>
							<th class="text-center">Presença</th>
						</thead>
						<tbody>
							@forelse ($lista as $item)
							<tr>
								<td><label for="{{$item->id}}">{{$item->name}}</label></td>
								<td class="text-center"><input type="checkbox" name="listarPresenca[]" value="{{$item->matricula}}" id="{{$item->id}}" checked></td>
							</tr>
							@empty

							@endforelse
							<tr>
								<td><strong>Selecionar Todos</strong></td>
								<td class="text-center"><input type="checkbox" name="checkTodos" id="checkTodos"></td>
							</tr>
						</tbody>
					</table>
				</card>
			</form>
		</div>
	</div>
</div>
@endsection
