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
	@can('adm', Auth::user())
	<div class="row justify-content-center">
		<div class="col-md-10">
			<card titulo="Lista de Funcionario" i='fas fa-list' cor="bg-nav" voltar="{{route('admin.home')}}">
				<div class="row">
					<div class="mb-2 col-md-6 offset-md-6 col-lg-5 offset-lg-7">
						<input type="text" name="busca" id="busca" placeholder="Buscar" data-list='.list' class="form-control">
					</div>
				</div>
				<ul class="list list-group list-group-flush">
					@forelse ($funcionarios as $funcionario)
						<li class="list-group-item">
							<div class="row">
								<div class="col-sm-6 col-md-4"><strong>Nome: </strong>{{$funcionario->name}}</div>
								<div class="col-sm-6 col-md-4"><strong>Email: </strong>{{$funcionario->email}}</div>
								<div class="col-sm-6 col-md-4 text-capitalize"><strong>Tipo de Acesso: </strong>{{$funcionario->tipo}}</div>
								<div class="col-sm-6 col-md-4"><strong>Telefone: </strong>{{$funcionario->telefone}}</div>
								{{-- <div class="col-sm-6 col-md-4"><strong>Local: </strong>{{$funcionario->Local}}</div> --}}
								<div class="col-sm-6 col-md-4"><strong>Data de Nascimento: </strong>{{$funcionario->dt_nasc}}</div>
							</div>
							<div class="row">
								<div class="col-4">
									<div class="btn-group" role="group">
										<button class="btn btn-primary dropdown-toggle" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opções</button>
										<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
											<button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal{{$funcionario->id}}">Definir Tipo de acesso</button>
											<a class="dropdown-item" href="{{route('admin.descadastrarFuncionario',['idFunc'=>$funcionario->id])}}">Remover Funcionario</a>
										</div>
									</div>
								</div>
							</div>
						</li>
						<div class="modal fade modal-select" id="modal{{$funcionario->id}}" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content bg-nav">
									<form action="{{route('admin.definirAcesso')}}" method="POST">
										<div class="modal-header">Definir Tipo de acesso</div>
										<div class="modal-body">
											@csrf
											<input type="hidden" name="idFuncionario" value="{{$funcionario->id}}">
											<input type="hidden" name="local" value="{{$funcionario->local}}">

											<div class="form-group row">
												<legend class="col-md-4 col-form-label text-md-right">Tipo de Acesso:</legend>
												<div class="col-md-8">
													<select name="tipo" id="tipo" class="form-control" required>
														<option value="">Escolha o tipo de acesso</option>
														<option value="financeiro">Financeiro</option>
														<option value="secrataria">Secretaria</option>
														<option value="administrativo">Administrativo</option>
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
					<li class="list-group-item">Nenhum Funcionário Cadastrado</li>
					@endforelse
				</ul>
			</card>
		</div>
	</div>
	@endcan
</div>
@endsection
