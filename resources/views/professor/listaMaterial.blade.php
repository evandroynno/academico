@extends('professor.layout.professor')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">

			<div class="bg-nav">
				<div class="card-header"><i class="fas fa-book"></i> Lista de Material on-line</div>
				<div class="card-body">
					<ul class="list-group list-group-flush">
						@forelse ($materiais as $material)
							<li class="list-group-item">
								<div class="row">
									<div class="col-md-4"><strong>Material:</strong> {{$material->name}}</div>
									<div class="col-md-2"><strong>Disciplina:</strong> {{$material->disciplina()->first()->name}}</div>
									<div class="col-md-4"><strong>Link:</strong> <a href="{{$material->link}}" target="blank"> {{$material->link}}</a></div>
									<div class="col-md-2">
										<a href="javascript:del({{$material->id}})" class="btn btn-danger text-white"><i class="fas fa-times-circle icone"></i> Apagar</a>
									</div>
								</div>
							</li>
						@empty
							<h4 class="text-center mt-2">Não há materiais cadastrados</h4>
						@endforelse
					</ul>
				</div>
				<div class="card-footer">
					<div class="row">
						<div class="col-md-6 offset-md-4">
							<a href="{{route('professor.home')}}" class="btn btn-primary text-white"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
							<a href="{{route('professor.cadMaterial')}}" class="btn btn-primary text-white"> <i class="fa fa-plus"></i> Cadastrar</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	function del(cod){
		if(confirm('Deseja excluir esse material')){
			location.href='../professor/deletar_material/'+cod;
		}
	}
</script>
@endsection
