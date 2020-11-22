@extends('aluno.layout.aluno')
@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="card bg-nav">
					<div class="card-header"><i class="fas fa-book"></i> Material de estudo on-line</div>
					<div class="card-body">
						<ul class="list-group list-group-flush">
							@forelse ($materiais as $material)
								<li class="list-group-item">
									<div class="row">
										<div class="col-md-4"><strong>Material:</strong> {{$material->name}}</div>
										<div class="col-md-5"><strong>Disciplina:</strong> {{$material->disciplina()->first()->name}}</div>
										{{-- <div class="col-md-4"><strong>Link:</strong> <a href="{{$material->link}}" target="blank"> {{$material->link}}</a></div> --}}
										<div class="col-md-3">
											<a href="{{$material->link}}" target="blank" class="btn btn-primary text-white"><i class="fas fa-eye icone"></i> Visualizar</a>
										</div>
									</div>
								</li>
							@empty
								<h4 class="text-center mt-2">Não há materiais cadastrados</h4>
							@endforelse
						</ul>
					</div>
					<div class="card-footer">
						<a href="{{route('aluno.home')}}" class="btn btn-primary text-white"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
