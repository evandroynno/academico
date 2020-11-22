@extends('admin.layout.admin')

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
		<div class="col-md-8">
			<div class="card bg-nav">
				<form action="{{route('admin.cadMaterialOk')}}" method="post" aria-label="Cadastra Material">
					@csrf
					<div class="card-header">Cadastrar Material</div>
					<div class="card-body">
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
									@forelse ($disciplinas as $disciplina)
										<option value="{{$disciplina->cod}}">{{$disciplina->name}}</option>
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
					<div class="card-footer">
						<div class="btn-group">
							<a href="{{URL::previous()}}" class="btn btn-primary text-white"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
							<button type="reset" class="btn btn-primary">Limpar campos</button>
							<button type="submit" class="btn btn-primary text-white"><i class="fas fa-plus-circle"></i> Adicionar Material</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
