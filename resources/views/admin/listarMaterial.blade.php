@extends('admin.layout.admin')

@section('content')
<div class="container">
	@if (session('status'))
		<div class="ror alert alert-info" role="alert">
			{{session('status')}}
		</div>
	@endif
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card bg-nav">
				<div class="card-header"><i class="fas fa-th-list"></i>	Listas de Materiais OnLine</div>
				<div class="card-body">
					<ul class="list-group list-group-flush">
						@forelse ($materiais as $material)
							<li class="list-group-item">
								<div class="row">
									<div class="col-md-4"><strong>Material:</strong> {{$material->name}}</div>
									<div class="col-md-2"><strong>Disciplina:</strong> {{$material->disciplina()->first()->name}}</div>
									<div class="col-md-4"><strong>Link:</strong> <a href="{{$material->link}}" target="blank"> {{$material->link}}</a></div>
									<div class="col-md-2">
										<a href="{{url("admin/deletar_material/$material->id")}}" class="btn btn-danger text-white"><i class="fas fa-times-circle icone"></i> Apagar</a>
									</div>
								</div>
							</li>
						@empty
							<h4 class="text-center mt-2">Não há materiais cadastrados</h4>
						@endforelse
					</ul>
				</div>
				<div class="card-footer">
					<div class="btn-group">
						<a href="{{route('admin.home')}}" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
						<a href="{{route('admin.cadMaterial')}}" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Cadastrar Material</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
