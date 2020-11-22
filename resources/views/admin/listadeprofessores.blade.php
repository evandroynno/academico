@extends('admin.layout.admin')
@section('content')
<div class="container">
	@if (session('status'))
		<div class="row alert alert-info alert-dismissible fade show" role="alert">
			{{session('status')}}
			<button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	@endif
	<div class="row justify-content-center">
		<div class="col-md-10">
			<card titulo='Lista de Professores' i='fas fa-th-list' cor='bg-nav' voltar="{{route('admin.home')}}">
				<div class="row">
					<div class="mb-2 col-md-6 offset-md-6 col-lg-5 offset-lg-7">
						<input type="text" name="busca" id="busca" placeholder="Buscar" data-list='.list' class="form-control">
					</div>
				</div>
				<ul class="list list-group list-group-flush">
					@forelse ($professores as $professor)
						<li class="list-group-item">
							<div class="row">
								<div class="col-sm-6 col-md-4"><strong>Nome:</strong> {{$professor->name}}</div>
								<div class="col-sm-6 col-md-4"><strong>Email:</strong> {{$professor->email}}</div>
								<div class="col-sm-6 col-md-4"><strong>Eclesialidade:</strong> {{$professor->eclesialidade}}</div>
								<div class="col-sm-6 col-md-4"><strong>Titularidade:</strong> {{$professor->titulo}}</div>
								<div class="col-sm-6 col-md-4"><strong>Especialização:</strong> {{$professor->especializacao}}</div>
								<div class="col-sm-6 col-md-4"><strong>Instituição:</strong> {{$professor->instituicao}}</div>

								<div class="col-sm-6 col-md-4"><strong>Disciplina:</strong>
									@if($professor->disciplinas)
										@foreach ($professor->disciplinas as $disc)
											{{$disc->disciplina->name}},
										@endforeach
									@else
									'Sem disciplina atribuida'
									@endif
									{{-- {{$professor->disciplinas ? $professor->disciplinas['1']->disciplina->name : 'Sem disciplina atribuida' }}</div> --}}
							</div>
							<div class="row">
								<div class="col-4">
									<div class="btn-group" role="group">
										<button class="btn btn-primary dropdown-toggle" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opções</button>
										<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
												<button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal{{$professor->id}}">Atribuir Disciplina</button>
											</div>
										</div>
								</div>
							</div>
						</li>
						<div class="modal fade modal-select" id="modal{{$professor->id}}" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content bg-nav">
									<form action="{{route('admin.atribuirDisciplina')}}" method="POST">
										<div class="modal-header">Atribuir Disciplina</div>
										<div class="modal-body">
											@csrf
											<input type="hidden" name="idProfessor" value="{{$professor->id}}">
											<input type="hidden" name="local" value="{{$professor->local}}">
											{{-- @php(dd($turma)) --}}
											<input type="hidden" name="semestre" value="{{$turma->semestre?$turma->semestre:'Semestre cadastrado'}}">
											<div class="form-group row">
												<legend class="col-md-4 col-form-label text-md-right">Matérias para o Semestre:</legend>
												<div class="col-md-8">
													<select name="disciplinas[]" required class="form-control select-multiple2" multiple='multiple'>
														@foreach($disciplinas as $disciplina)
															@if(preg_match('/'.$disciplina->cod.'/',$turma->disciplinas))
																<option value="{{$disciplina->id}}">{{$disciplina->name}}</option>
															@endif
														@endforeach
													</select>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
											<button type="submit" class="btn btn-primary">Enviar</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					@empty
						<li class="list-group-item">Nenhum Professor Cadastrado</li>
					@endforelse
				</ul>
			</card>
		</div>
	</div>
</div>
@endsection
