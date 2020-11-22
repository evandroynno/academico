@extends('admin.layout.admin')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="row alert alert-success" role="alert">
			{{ session('status') }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
				<span aria-hidden="true">&times;</span>
			</button>
        </div>
    @endif
    @if (session('error'))
        <div class="row alert alert-danger" role="alert">
            {{ session('status') }}
			<button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
    @endif
    <div class="row justify-content-center">
		@can('cadastro', Auth::user())
		<div class="col-md-4 my-3">
			<card titulo="Administrativo" i="fas fa-cogs" cor="bg-nav">
				<ul class="list-group list-group-flush">
					<li class="list-group-item"><strong>Cadastros</strong>
						<ul class="list-group list-group-flush">
							<li class="list-group-item"><a href="{{ route('admin.cadAluno') }}">Cadastrar Aluno</a>
							<ul class="list-group list-group-flush">
								<li class="list-group-item"><a href="{{ route('admin.listarpendente') }}">Alunos a confirmar</a></li>
							</ul>
							</li>
							<li class="list-group-item"><a href="{{ route('admin.cadProf') }}">Cadastrar Professor</a></li>
							@can('adm', Auth::user())
							<li class="list-group-item"><a href="{{ route('admin.cadFunc') }}">Cadastrar Funcionário</a></li>
							@endcan
						</ul>
					</li>
					<li class="list-group-item"><a href="{{route('admin.listarProfessores')}}">Lista de Professores</a></li>
					<li class="list-group-item"><a href="{{route('admin.listaAluno')}}">Lista de Alunos</a></li>
					@can('adm', Auth::user())
					<li class="list-group-item"><a href="{{route('admin.listaFunc')}}">Lista de Funcionario</a></li>
					@endcan
				</ul>
			</card>
    	</div>
		@endcan
		@can('academico', Auth::user())
		<div class="col-md-4 my-3">
			<card titulo="Acadêmico" i="fas fa-book" cor="bg-nav">
				<ul class="list-group list-group-flush">
					<li class="list-group-item"><a href="{{route('admin.listarDisciplinas')}}"><strong>Listar Disciplinas</strong></a></li>
					<li class="list-group-item"><a href="{{route('admin.listarMaterial')}}"><strong>Material on-line</strong></a></li>

					<li class="list-group-item"><strong>Professor</strong>
						<ul class="list-group list-group-flush">
							<li class="list-group-item"><a href="{{route('admin.selecionarMateria')}}">Lançar Notas</a></li>
							{{-- <li class="list-group-item"><a href="{{route('admin.lancarObservacao')}}">Lancar Observações</a></li> --}}
						</ul>
					</li>
					<li class="list-group-item"><a href="{{route('admin.criarTurma')}}">Criar de Turmas</a></li>
					<li class="list-group-item"><a href="{{route('admin.listarTurma')}}">Listar de Turmas</a></li>

					<li class="list-group-item"><a href="{{route('admin.solicitacoes')}}">Solicitações Pendentes
						@if($solicitacoes->count() > 0)
							<span class="badge badge-primary">{{$solicitacoes->count()}}</span>
						@endif
					</a></li>
				</ul>
			</card>
		</div>
		@endcan
		@can('finance', Auth::user())
		<div class="col-md-4 my-3">
			<card titulo="Financeiro" i="fas fa-dollar-sign" cor="bg-nav">
				<ul class="list-group list-group-flush">
					@can('geral', Auth::user())
					<li class="list-group-item"><strong>Mensalidades</strong>
						<ul class="list-group list-group-flush">
							<li class="list-group-item"><a href='{{route('admin.listaParaPagamentos')}}'>Registrar Pagamento</a></li>
						</ul>
					</li>
					<li class="list-group-item"><strong>Controle Financeiro</strong>
						<ul class="list-group list-group-flush">
							<li class="list-group-item"><a href='{{route('admin.historicoMovimentos')}}'>Transações</a></li>
						</ul>
					</li>
					@endcan
					@can('relatoriosFinan', Auth::user())
					<li class="list-group-item"><strong>Relatórios</strong>
						<ul class="list-group list-group-flush">
							<li class="list-group-item"><a href='{{route('admin.relatorioDeMensalidades')}}'>Gerar Relatorio de Mensalidades</a></li>
							<li class="list-group-item"><a href='{{route('admin.escolhaMes')}}'>Gerar Relatorio de Movimentações</a></li>
							{{-- <li class="list-group-item"><a href='#'>Gerar Relatorio de Despesas</a></li> --}}
						</ul>
					</li>
					@endcan
				</ul>
			</card>
		</div>
		@endcan
	</div>
</div>
@endsection

@section('script')
<script src="{{asset('js/jquery.maskMoney.js')}}"></script>
<script>
	$("#valor").maskMoney({prefix:'R$ ', allowNegative: false, thousands:'.', decimal:',', affixesStay: false});

	$("[name=tipo]").change(function(){
		var tipo = $(this).val();
		if(tipo == 'E'){
			$('#addon1').text('+');
		}else{
			$('#addon1').text('-')
		}

	})
	console.log($("[name=tipo]").val())
</script>

@endsection

