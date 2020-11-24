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
		<div class="col-12">
			<div class="card bg-nav">
				<div class="card-header">Alunos</div>
				<div class="card-body">
					<div class="row">
						<div class="mb-2 col-md-6 offset-md-6 col-lg-5 offset-lg-7">
							<input type="text" name="busca" id="busca" placeholder="Buscar" data-list='.list' class="form-control">
						</div>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item">
							<div class="row">
								<div class="col-4"><strong>Nome</strong></div>
								<div class="col-2"><strong>Matricula</strong></div>
								<div class="col-4"><strong>Email</strong></div>
								<div class="col-2"><strong>Ações</strong></div>
							</div>
						</li>
					</ul>
					<ul class="list list-group list-group-flush">
						@forelse ($dados as $aluno)
							<li class="list-group-item">
								<div class="row">

									<div class="col-4">{{$aluno->aluno->name}}</div>
									<div class="col-2">{{$aluno->aluno->matricula}}</div>
									<div class="col-4">{{$aluno->aluno->email}}</div>
									<div class="col-2">
										<a data-toggle="collapse" href="#collapse{{$aluno->aluno->id}}" aria-expanded="false" aria-controls="collapse{{$aluno->aluno->id}}" class="btn btn-primary text-white">Opções</a>
									</div>
								</div>
								<div class="row collapse" id="collapse{{$aluno->aluno->id}}">
									<div class="container">
										<div class="row my-2">
											<div class="col-2"><strong>Data de Nascimento</strong></div>
											<div class="col-3">{{$aluno->aluno->dt_nasc}}</div>
											<div class="col-2"><strong>Telefone</strong></div>
											<div class="col-2">{{$aluno->aluno->telefone}}</div>
											<div class="col-2"><strong>Etapa</strong></div>
											<div class="col-1">{{$aluno->aluno->etapa_curso}}</div>
										</div>
{{-- 										<div class="row justify-content-around my-2">
											<a href="#" class="btn btn-sm btn-primary text-white">Editar Informações</a>
											<a href="#" class="btn btn-sm btn-primary text-white">Gerar Histórico</a>
										</div>
 --}}									</div>
								</div>
							</li>
						@empty
							<h4 class="text-center mt-2">Não há alunos cadastrados</h4>
						@endforelse
					</ul>
				</div>
				<div class="card-footer">
					<a href="{{route('admin.home')}}" class="btn btn-primary text-white"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
