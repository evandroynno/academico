@extends('aluno.layout.aluno')

@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<card titulo="Notas do Curso" i="fas fa-book-reader" cor="bg-nav" voltar="{{route('aluno.home')}}">
				<div class="table-responsive-lg">
					<table class="table">
						<thead>
							<tr>
								<th class="text-nowrap">Disciplina</th>
								<th class="text-nowrap">Nota 1</th>
								<th class="text-nowrap">Nota 2</th>
								<th class="text-nowrap">Nota Final</th>
								<th class="text-nowrap">Observações</th>
							</tr>
						</thead>
						<tbody>
							@forelse($notas as $note)
							<tr>
								<td class="text-nowrap">{{$note->disciplina->cod}} - {{$note->disciplina->name}}</td>
								<td class="text-nowrap">
									@if($note->nota1 == 0)
										Nota não atribuída
									@else
										{{$note->nota1}}
									@endif
								</td>
								<td class="text-nowrap">
									@if($note->nota1 == 0)
										Nota não atribuída
									@else
										{{$note->nota1}}
									@endif

								</td>
								<td class="text-nowrap">
									@if($note->notaFinal == 0)
										Nota não atribuída
									@else
										{{$note->notaFinal}}
									@endif
								</td>
								<td class="text-nowrap">{{$note->Observação}}</td>
							</tr>
							@empty
							<tr>
								<td colspan="5">Nenhuma Nota Atribuída</td>
							</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</card>
		</div>
	</div>
	
</div>

@endsection