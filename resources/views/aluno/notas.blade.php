@extends('aluno.layout.aluno')
@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="card bg-nav">
					<div class="card-header">Notas do Curso</div>
					<div class="card-body">

					</div>
					<div class="card-footer">
						<a href="{{route('aluno.home')}}" class="btn btn-primary text-white"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
