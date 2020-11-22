@extends('aluno.layout.aluno')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-10">
			<div class="card bg-nav">
				<div class="card-header"><i class="fas fa-book"></i> Disciplinas Inscritas</div>
				<div class="card-body">
					<ul>
						@forelse ($mats as $materia)
							<li>{{$materia->name}}</li>
						@empty
							Grade não Cadastrada
						@endforelse
					</ul>

				</div>
				<div class="card-footer">
					<div class="btn-group">
						<a href="{{route('aluno.home')}}" class="btn btn-primary text-white"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
