@extends('professor.layout.professor')

@section('content')
<div class="container">
	@if (session('status'))
        <div class="row alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card bg-nav">
                <div class="card-header"><i class="fas fa-book"></i> Disciplina</div>
                <div class="card-body">
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><a href="{{route('professor.listMaterial')}}">Material on-line</a></li>
						<li class="list-group-item"><a href="{{route('professor.selecionarData')}}">Lista de Presença</a></li>
						<li class="list-group-item"><a href="{{route('professor.selecionarDisciplina')}}">Lançar Notas</a></li>
					</ul>
                </div>
            </div>
		</div>
		<div class="col-md-4">
			<div class="card bg-nav text-white">
				<div class="card-header"><i class="fas fa-info"></i> Informações</div>
				<div class="card-body">
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><a href="{{route('professor.editarDados')}}">Dados Cadastrais</a></li>
						<li class="list-group-item"><a href="{{route('professor.alterSenha')}}">Alterar senha</a></li>
					</ul>
				</div>
			</div>
		</div>
    </div>
</div>
@endsection
