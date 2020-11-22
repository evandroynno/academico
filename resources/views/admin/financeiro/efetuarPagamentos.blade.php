@extends('admin.layout.admin')

@section('content')
<div class="container">
	@if (session('status'))
		<div class="row alert alert-primary" role="alert">
			{{session('status')}}
		</div>
	@endif
	<div class="row justify-content-center">
		<div class="col-12">
			<div class="card bg-nav">
				<div class="card-header"><i class="fas fa-dollar-sign"></i> Efetuar Pagamento Mensalidade</div>
				<div class="card-body">
					<div class="row my-2">
						<div class="col-12">
							<div class="row">
								<div class="col-6"><strong>Nome:</strong> {{$aluno->name}}</div>
								<div class="col-6"><strong>Matrícula:</strong> {{$aluno->matricula}}</div>
							</div>
							<div class="row">
								<div class="col-6"><strong>Creditos:</strong> {{$aluno->grades->first()->creditos}}</div>
								<div class="col-6"><strong>Bolsa</strong> {{$aluno->bolsa? 'Sim ('.$aluno->bolsa->percentual.'%)' : 'Não'}}</div>
							</div>
						</div>
					</div>
					<div class="container text-center bg-light">
						<div class="row align-items-baseline">
							<div class="col-2 mt-2 mb-2"><strong>Semestre</strong></div>
							<div class="col-1"><strong>Mês</strong></div>
							<div class="col-3"><strong>Data de Vencimento</strong></div>
							<div class="col-2"><strong>Valor</strong></div>
							<div class="col-3 text-center"><strong>Ação</strong></div>
						</div>
						@forelse ($aluno->mensalidades as $mensalidade)
							<div class="row {{\Carbon\Carbon::parse($mensalidade->data_venv) < $h && $mensalidade->pago == false ?'bg-danger text-white':''}}{{$mensalidade->pago == true ?'bg-success text-white':''}} align-items-baseline">
								<div class="col-2">{{$mensalidade->semestre}}</div>
								<div class="col-1">{{mes($mensalidade->mes)}}</div>
								<div class="col-3">{{data($mensalidade->data_venv)}}</div>
								<div class="col-2">{{moeda($mensalidade->valor)}}</div>
								<div class="col-3 text-center">
									@if(!$mensalidade->pago)
										<a href="{{URL("/admin/efetuar_pagamentoOk/$mensalidade->id")}}" class="btn btn-success text-white w-50" onclick="return confirm('Confirmar Pagamento?')"><i class="fas fa-dollar-sign"></i> Pagar</a>
									@else
										<a href="{{URL("/admin/reverter_pagamento/$mensalidade->id")}}" class="btn btn-danger text-white w-50" onclick="return confirm('Reverter pagamento?')"><i class="fas fa-undo"></i> Reverter</a>

									@endif
									{{-- <a href="{{URL("/admin/efetuar_pagamentoOk/$mensalidade->id")}}" class="btn text-white {{$mensalidade->pago?'btn-secondary disabled':'btn-success'}}"><i class="fas fa-dollar-sign"></i> Pagar</a> --}}
								</div>
							</div>
						@empty

						@endforelse
					</div>
				</div>
				<div class="card-footer">
					<a href="{{route('admin.listaParaPagamentos')}}" class="btn btn-primary text-white"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
