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
			<div class="card bg-nav">
				<div class="card-header">Alunos</div>
				<div class="card-body">
					<div class="row">
						<div class="mb-2 col-md-6 offset-md-6 col-lg-5 offset-lg-7">
							<input type="text" name="busca" id="busca" placeholder="Buscar" data-list='.list' class="form-control">
						</div>
					</div>
					<ul class="list list-group list-group-flush">
						@forelse ($alunos as $aluno)
							<li class="list-group-item">
								<div class="row">
									<div class="col-sm-4"><strong>Nome:</strong> {{$aluno->name}}</div>
									<div class="col-sm-4"><strong>Matricula:</strong> {{$aluno->matricula}}</div>
									<div class="col-sm-4"><strong>Email:</strong> {{$aluno->email}}</div>
								</div>
								<div class="row">
									<div class="col-sm-4"><strong>Periodo:</strong> </div>
									<div class="col-sm-4"><strong>Situação:</strong> {{$aluno->status}}</div>
									<div class="col-sm-4"></div>
								</div>
								<div class="row">
									<div class="col-sm-4"><strong>Creditos:</strong> {{($aluno->gradesAtual != null) ? $aluno->gradesAtual->creditos:"0"}}</div>
									<div class="col-sm-4"><strong>Bolsista:</strong> {{$aluno->bolsa ? "Sim (".$aluno->bolsa->percentual."%)" : 'Não'}}</div>
									<div class="col-sm-4"><strong>Valor Mensal:</strong> {{$aluno->bolsa ? valorBolsista(($aluno->gradesAtual != null) ? $aluno->gradesAtual->creditos:0,$aluno->bolsa->percentual) : valorMensal(($aluno->gradesAtual != null) ? $aluno->gradesAtual->creditos:"0")}}</div>
								</div>
								<div class="row justify-content-right my-2">
									<div class="col-sm-4">
										<div class="btn-group" role="group">
											<button class="btn btn-primary dropdown-toggle" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opções</button>
											<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
												<a href="{{url("admin/lista_de_alunos/cadGrade/$aluno->id")}}" class="dropdown-item">Atribuir Grade</a>
												<a href="{{url("admin/lista_de_alunos/verGrade/$aluno->id")}}" class="dropdown-item">Ver Grade</a>
												<button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal{{$aluno->id}}">Atribuir Bolsa</button>
												{{-- <a href="#" class="dropdown-item">Atribuir Bolsa</a> --}}
												<a href="{{url("admin/lista_de_alunos/gerarHistorico/$aluno->id")}}" class="dropdown-item">Gerar Histórico</a>
											</div>
										</div>
									</div>
								</div>
							</li>
							<div class="modal fade" id="modal{{$aluno->id}}" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<form action="{{route('admin.atribuirBolsa')}}" method="POST">
											<div class="modal-header">Atribuir Bolsa</div>
											<div class="modal-body">
												@csrf
												<input type="hidden" name="idAluno" value="{{$aluno->id}}">
												<div class="form-group row">
													<label for="percentual" class="col-4 col-form-label text-md-right">Percentual</label>
													<div class="col-8 input-group">
														<input type="number" min="0" max="100" class="form-control" name="percentual">
														<div class="input-group-append"><span class="input-group-text">%</span></div>
													</div>
												</div>
												<div class="form-group row">
													<label for="mantenedor" class="col-4 col-form-label text-md-right">Mantenedor</label>
													<div class="col-8">
														<input type="text" class="form-control" name="mantenedor">
													</div>
												</div>
												<div class="form-group row">
													<span for="carta" class="col-4 col-form-label text-md-right">Apresentou Carta:</span>
													<div class="col-8">
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="carta" id="cartaSim" value='1'>
															<label for="cartaSim" class="form-check-label">Sim</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="carta" id="cartaNao" value='0'>
															<label for="cartaNao" class="form-check-label">Não</label>
														</div>
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
