@extends('aluno.layout.aluno')

@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12">
				<card cor="bg-nav" i='fas fa-dollar-sign' titulo="Informações de pagamentos" voltar="{{route('aluno.home')}}">
					<div class="row my-2">
						<div class="col-12">
							<div class="row">
								<div class="col-6"><strong>Nome:</strong> {{$aluno->name}}</div>
								<div class="col-6"><strong>Matrícula:</strong> {{$aluno->matricula}}</div>
							</div>
							<div class="row">
								<div class="col-6"><strong>Creditos:</strong> {{$aluno->gradesAtual->creditos}}</div>
								<div class="col-6"><strong>Bolsa</strong> {{$aluno->bolsa? 'Sim ('.$aluno->bolsa->percentual.'%)' : 'Não'}}</div>
							</div>
						</div>
					</div>
					<div class="container text-center bg-light">
						<div class="row align-items-baseline">
							<div class="col-2 mt-2 mb-2"><strong>Semestre</strong></div>
							<div class="col-2"><strong>Mês</strong></div>
							<div class="col-3"><strong>Data de Vencimento</strong></div>
							<div class="col-2"><strong>Valor</strong></div>
							<div class="col-3"><strong>Status</strong></div>

						</div>
						@forelse ($aluno->mensalidades as $mensalidade)
							<div class="row {{\Carbon\Carbon::parse($mensalidade->data_venv) < $h && $mensalidade->pago == false ?'bg-danger text-white':''}}{{$mensalidade->pago == true ?'bg-success text-white':''}} align-items-baseline">
								<div class="col-2">{{$mensalidade->semestre}}</div>
								<div class="col-2">{{mes($mensalidade->mes)}}</div>
								<div class="col-3">{{data($mensalidade->data_venv)}}</div>
								<div class="col-2">{{moeda($mensalidade->valor)}}</div>
								<div class="col-3">
									@if(\Carbon\Carbon::parse($mensalidade->data_venv) < $h && $mensalidade->pago == false)
										Em atraso
									@elseif($mensalidade->pago == true)
										Pago
									@else
										Em aberto
									@endif
								</div>
							</div>
						@empty

						@endforelse
					</div>
				</card>
				
			</div>
		</div>
	</div>
	
@endsection
