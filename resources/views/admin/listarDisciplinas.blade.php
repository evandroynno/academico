@extends('admin.layout.admin')

@section('content')
<div class="container">
	@if (session('status'))
		<div class="row alert alert-info alert-dismissible fade show" role="alert">
			{{ session('status') }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	@endif
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card bg-nav">
				<div class="card-header"><i class="fas fa-th-list"></i> Lista de Disciplinas</div>

				<div class="card-body">
					<ul class="list-group list-group-flush">
						<li class="list-group-item">
							<div class="row">
								<div class="col-2"><strong>Código</strong></div>
								<div class="col-3"><strong>Nome da Disciplina</strong></div>
								<div class="col-1"><strong>Crédito</strong></div>
								<div class="col-4"><strong>Requisito</strong></div>
								<div class="col-2"><strong>Ações</strong></div>
							</div>
						</li>
					</ul>
					<ul class="list-group list-group-flush">
						@forelse ($disciplinas as $disciplina)
							<li class="list-group-item">
								<div class="row">
									<div class="col-2">{{strtoupper($disciplina->cod)}}</div>
									<div class="col-3">{{$disciplina->name}}</div>
									<div class="col-1">{{$disciplina->creditos}}</div>
									<div class="col-4">
										@isset($disciplina->requisito_cod)
											{{strtoupper($disciplina->requisito_cod)}} - {{$disciplina->requisito()->first()->name}}
										@endisset
									</div>
									<div class="col-2">
										<a href="#"><i class="fas fa-times-circle text-danger icone"></i></a>
										<a data-toggle="collapse" href="#collapse{{$disciplina->cod}}" aria-expanded="false" aria-controls="collapse{{$disciplina->cod}}"><i class="fas fa-info-circle text-info icone"></i></a>
									</div>
								</div>
								<div class="row mt-3 collapse" id='collapse{{$disciplina->cod}}'>
									<div class="col-2"><strong>Etapa Anual</strong></div>
									<div class="col-4">
										{{$disciplina->semestre}}
									</div>
									<div class="col-2"><strong>Semestre</strong></div>
									<div class="col-4">{{$disciplina->periodo}}</div>
								</div>
							</li>
						@empty
							<h4 class="text-center mt-2">Não há disciplinas cadastradas</h4>
						@endforelse
					</ul>
				</div>
				<div class="card-footer">
					<div class="btn-group">
						<a href="{{route('admin.home')}}" class="btn btn-primary text-white"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
						<a href="{{route('admin.cadDisciplina')}}" class="btn btn-primary text-white"><i class="fas fa-plus-circle"></i> Adicionar Disciplina</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
