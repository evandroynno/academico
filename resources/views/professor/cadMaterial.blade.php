@extends('professor.layout.professor')
@section('content')
<div class="container">
	@if (session('status'))
		<div class="row alert alert-info" role="alert">
			{{ session('status') }}
		</div>
	@endif
	@if (session('error'))
		<div class="row alert alert-danger" role="alert">
			{{ session('error') }}
		</div>
	@endif
	<div class="row justify-content-center">
		<div class="col-md-10">
			<form action="" method="post">
				@csrf
				<card titulo="Cadastrar Material" i='fas fa-book' cor="bg-nav" voltar="{{route('professor.home')}}" submit="Cadastrar">
					<div class="form-group row">
							<legend class="col-md-4 col-form-label text-md-right">Nome do Material</legend>
							<div class="col-md-6">
								<input type="text" name="nomeMaterial" id="nomeMaterial" class="form-control" autofocus required>
							</div>
						</div>
						<div class="form-group row">
							<legend class="col-md-4 col-form-label text-md-right">Disciplina</legend>
							<div class="col-md-6">
								<select name="disciplina_cod" id="disciplina_cod" class="form-control">
									<option value="">Escolha uma Disciplina</option>
									@forelse (Auth::user()->disciplinas as $disciplina)
										<option value="{{$disciplina->disciplina->cod}}">{{$disciplina->disciplina->name}}</option>
									@empty

									@endforelse
								</select>
							</div>
						</div>
						<div class="form-group row">
							<legend class="col-md-4 col-form-label text-md-right">Link</legend>
							<div class="col-md-6">
								<input type="text" name="link" id="link" class="form-control" autofocus required>
							</div>
						</div>
					</div>
				</card>
			</form>
		</div>
	</div>
</div>
@endsection
