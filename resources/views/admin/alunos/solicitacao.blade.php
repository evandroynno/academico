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
		<div class="col-12">
			<div class="card bg-nav">
				<div class="card-header"><i class="fas fa-align-justify"></i> Solicitações</div>
				<div class="card-body">
					<div class="row">
						<div class="mb-2 col-md-6 offset-md-6 col-lg-5 offset-lg-7">
							<input type="text" name="busca" id="busca" placeholder="Buscar" data-list='.list' class="form-control">
						</div>
					</div>
					<div class="table-responsive-lg">
 						<table class="table table-hover">
							<thead>
								<tr>
									<th class="text-nowrap" scope="col">Tipo</th>
									<th class="text-nowrap" scope="col">Status</th>
									<th class="text-nowrap" scope="col">Mensagem</th>
									<th class="text-nowrap" scope="col">Criado em:</th>
									<th class="text-nowrap" scope="col">Ações</th>

								</tr>
							</thead>
							<tbody class='list'>
							@forelse($solicitacoes as $solicitacao)
								<tr>
									<td class="text-nowrap text-capitalize">{{$solicitacao->tipo}}</td>
									<td class="text-nowrap">{{$solicitacao->status}}</td>
									<td class="text-nowrap">
										@foreach($solicitacao->mensagens as $msg)
											 @if($loop->index % 2 == 0)
											 <div class="row bg-white" >
											 @else
											 <div class="row" >
											 @endif
											 
												<div class="col-md-4">

													@if($msg->name == Auth::user()->name)
														Eu
													@else
														{{$msg->name}}
													@endif
												</div>
												<div class="col-md-8 text-wrap">{{$msg->mensagem}} </div>
											</div>
										@endforeach
									</td>
									<td class="text-nowrap">{{$solicitacao->created_at}}</td>
									<td class="text-nowrap">
										<button class="btn btn-primary mb-2" data-toggle="modal" data-target="#modal" data-solicitacao={{$solicitacao->id}}>Responder</button>
										<a href="{{route('admin.encerrarSolicitacao', ['idSolicitacao' => $solicitacao->id])}}" class="btn btn-secondary text-white mb-2" onclick="return confirm('Encerrar Solicitação?')">Encerrar</a>
									</td>
								</tr>
							@empty
								<tr>
									<td class="text-nowrap" colspan="5">
										<h3>Não Há solicitações</h3>
									</td>
								</tr>
							@endforelse
							</tbody>
						</table>
					</div>
				</div>
				<div class="card-footer">
					<div class="row">
						<div class="col-md-6 offset-md-4"><a href="{{route('admin.home')}}" class="btn btn-primary"> <i class="fas fa-arrow-circle-left"></i> Voltar</a></div>
					</div>
				</div>
			</div>
			<div class="modal fade" id="modal" tabindex="1" role="dialog" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content bg-nav">
						<form action="{{route('admin.responderSolicitacao')}}" method="POST">
							@csrf
						<div class="modal-header"><h5 class="modal-title">
							<i class="fas fa-comments"></i> Nova mensagem</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							{{-- <span class="solicitacao"></span> --}}
							<input type="hidden" name="solicitacao" id="solicitacao">
							<div class="form-group">
								<label for="message-text" class="col-form-label">Message:</label>
								<textarea class="form-control" id="message-text" name="mensagem"></textarea>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
							<button class="btn btn-primary" type="submit">Enviar</button>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection