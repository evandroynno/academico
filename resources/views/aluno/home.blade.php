@extends('aluno.layout.aluno')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="row alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row justify-content-center">
		@if(Auth::user()->grades->toArray())
        <div class="col-md-4 mb-2">
            <div class="card bg-nav">
                <div class="card-header"><i class="fas fa-book"></i> Disciplinas</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href='{{route('aluno.disciplinas')}}'>Disciplinas do curso</a></li>
                        <li class="list-group-item"><a href='{{route('aluno.material')}}'>Material On-line</a></li>
                        {{-- <li class="list-group-item"><a href='#'>Horario das turmas</a></li> --}}
                    </ul>
                </div>
			</div>
        </div>
		@endif
        <div class="col-md-4 mb-2">
			<div class="card bg-nav text-white">
				<div class="card-header"><i class="fas fa-laptop"></i> Consultas Acadêmicas</div>

				<div class="card-body">
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><a href='{{route('aluno.notas')}}'>Notas do Curso</a></li>
						{{-- <li class="list-group-item"><a href='#'>Pendencias de documentos</a></li> --}}
						<li class="list-group-item"><a href='{{route('aluno.consultarPagamento')}}'>Consultar Pagamentos</a></li> 
						<li class="list-group-item"><a href='{{route('aluno.solicitacoes')}}'>Solicitações 
                            @if(Auth::user()->solicitacaosRespondidas->count()>0)
                                <span class="badge badge-primary">{{Auth::user()->solicitacaosRespondidas->count()}}</span>
                            @endif
                        </a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-md-4 mb-2">
            <div class="card bg-nav">
                <div class="card-header"><i class="fas fa-info"></i> Informações</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><a href="{{route('aluno.editarDados')}}">Dados Cadastrais</a></li>
                        <li class="list-group-item"><a href="{{route('aluno.editarDados')}}">Alterar senha</a></li>
                        {{-- <li class="list-group-item"><a href="#">Calendario Acadêmico</a></li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
