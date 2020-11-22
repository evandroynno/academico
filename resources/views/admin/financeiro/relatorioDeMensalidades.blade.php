@extends('admin.layout.admin')
@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="card bg-nav">
					<div class="card-header"></div>
					<div class="card-body">
						<div class="row">
							<div class="mb-2 col-md-6 offset-md-6 col-lg-5 offset-lg-7 text-right">
								<a href="{{route('admin.baixarRelatorio')}}" class="btn btn-primary text-white" target="_blank"><i class="fas fa-download"></i> Salvar em PDF</a>
							</div>
						</div>
						<div class="table-responsive">
							<table class="table table-striped table-responsive">
								<thead>
									<tr>
										<th class="text-nowrap" scope="col">Nome</th>
										<th class="text-nowrap" scope="col">Valor Mensal</th>
										<th class="text-nowrap" scope="col">Valor do semestre</th>
										@foreach ($meses as $mes)
										<th class="text-nowrap" scope="col">{{mes($mes)}}</th>
										@endforeach
										<th class="text-nowrap" scope="col">Recebido</th>
										<th class="text-nowrap" scope="col">Subtotal</th>
										<th class="text-nowrap" scope="col">Credito</th>
										<th class="text-nowrap" scope="col">Em Aberto</th>
									</tr>
								</thead>
								<tbody class="list">
									@foreach ($alunos as $aluno)
									@if ($aluno->gradesAtual != null && $aluno->gradesAtual->creditos != 0)
									<tr>
										@php
											$i=0
										@endphp
										<td class="text-nowrap">{{$aluno->name}}</td>
										<td class="text-nowrap">
											@if($aluno->bolsa != null)
												{{valorBolsista($aluno->gradesAtual->creditos,$aluno->bolsa['percentual'])}}
											@else
												{{valorMensal($aluno->gradesAtual->creditos)}}
											@endif
										</td>
										<td class="text-nowrap">
											@if($aluno->bolsa != null)
												R$ {{(int)valorBolsistaDB($aluno->gradesAtual->creditos,$aluno->bolsa['percentual'])*6}},00
											@else
												R$ {{(int)valorMensalDB($aluno->gradesAtual->creditos)*6}},00
											@endif
										</td>
										@foreach($aluno->mensalidades as $mensalidade)
										@if($aluno->bolsa != null && $aluno->bolsa['percentual'] == '100')
											<td class="bg-secondary">
												Isento
											</td>
										@elseif ($mensalidade->pago)
											<td class="bg-success">
												Pago
											</td>
										@else
											<td class="text-nowrap">Em Aberto</td>
										@endif
										@endforeach
										<td class="text-nowrap">
											{{-- contar mensalidades pagas --}}
											@foreach ($aluno->mensalidades as $mensalidade)
												@if ($mensalidade->pago)
												@php
													$i++;
												@endphp
												@endif
											@endforeach

											@if($aluno->bolsa != null)
												R${{(int)valorBolsistaDB($aluno->gradesAtual->creditos,$aluno->bolsa['percentual'])*$i}},00
											@else
												R${{(int)valorMensalDB($aluno->gradesAtual->creditos)*$i}},00
											@endif

										</td>
										<td class="text-nowrap">
											@if($aluno->bolsa != null)
												R${{((int)valorBolsistaDB($aluno->gradesAtual->creditos,$aluno->bolsa['percentual'])*6)-((int)valorBolsistaDB($aluno->gradesAtual->creditos,$aluno->bolsa['percentual'])*$i)}},00
											@else
												R${{((int)valorMensalDB($aluno->gradesAtual->creditos)*6)-((int)valorMensalDB($aluno->gradesAtual->creditos)*$i)}},00
											@endif
										</td>
										<td class="text-nowrap"></td>
										<td class="text-nowrap"></td>
									</tr>
									@endif
									@endforeach
								</tbody>
							</table>
						</div>
					</div>
					<div class="card-footer">
						<a href="{{route('admin.home')}}" class="btn btn-primary text-white"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
