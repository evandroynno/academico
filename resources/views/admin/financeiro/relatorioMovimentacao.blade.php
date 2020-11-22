@extends('admin.layout.admin')
@section('content')

<div class="container">
	<div class="row justify-content-center">
		<div class="col-12">
			<card titulo="Reletorio de Movimentação" i="fas fa-dollar-sign" cor="bg-nav" voltar="{{route('admin.home')}}">
				<div class="row">
					<div class="mb-2 col-md-6 offset-md-6 col-lg-5 offset-lg-7 text-right">
						<a href="{{route('admin.baixarRelatorioMovs')}}" class="btn btn-primary text-white" target="_blank"><i class="fas fa-download"></i> Salvar em PDF</a>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table table-striped table-responsive">
						<thead>
							<tr>
								<td class="text-nowrap" scope="col">Nome</td>
								<td class="text-nowrap" scope="col">Tipo</td>
								<td class="text-nowrap" scope="col">Valor</td>
								<td class="text-nowrap" scope="col">Descrição</td>
								<td class="text-nowrap" scope="col">Data</td>
							</tr>
						</thead>
						<tbody class="list">
							@forelse ($movs as $mov)
								<tr
								@if ($mov->tipo == 'E')
									class="text-white bg-success"
								@else
									class="text-white bg-danger"
								@endif
								>
									<td class="text-nowrap">{{$mov->nome}}</td>
									<td class="text-nowrap">
										@if ($mov->tipo == 'E')
											Entrada
										@else
											Saída
										@endif
									</td>
									<td class="text-nowrap">
										R$ {{$mov->valor}},00
									</td>
									<td class="text-nowrap">{{$mov->descricao}}</td>
									<td class="text-nowrap">{{date( 'd-m-Y' , strtotime($mov->data) )}}</td>
								</tr>
							@empty
								<tr>
									<td colspan="5"><h3>Não há registros</h3></td>
								</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</card>
		</div>
	</div>
</div>

@endsection
