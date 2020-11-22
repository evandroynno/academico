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
				<div class="card-header">Cadastrar Disciplina</div>
				<div class="card-body">
					<form action="{{route('admin.cadDisciplinaOk')}}" method="post" aria-label="Cadastrar Disciplina" autocomplete="off">
						@csrf
						<div class="form-group row">
							<legend class="col-md-3 col-form-label text-md-right">Nome</legend>
							<div class="col-md-8">
								<input type="text" name="name" id="name" class="form-control{{$errors->has('name')?' is invalid':''}}" value="{{old('name')}}" required autofocus>
								@if ($errors->has('name'))
									<span class="invalid-feedback" role="alert">
										<strong>{{$errors->first('name')}}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<legend class="col-md-3 col-form-label text-md-right">Código</legend>
							<div class="col-md-8">
								<input type="text" name="cod" id="cod" class="form-control{{$errors->has('cod')?' is-invalid':''}}" value="{{old('cod')}}" required autofocus>
								@if ($errors->has('cod'))
									<span class="invalid-feedback">
										<strong>{{$errors->first('cod')}}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<legend class="col-md-3 col-form-label text-md-right">Periodo</legend>
							<div class="col-md-8">
								<select name="etapa" id="etapa" class="form-control">
									<option value="A">Ano A</option>
									<option value="B">Ano B</option>
									<option value="C">Ano C</option>
									<option value="E">Eletivas e Linguas</option>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<legend class="col-md-3 col-form-label text-md-right">Créditos</legend>
							<div class="col-md-8">
								<input type="number" name="creditos" id="creditos" class="form-control{{$errors->has('creditos')?' is-invalid':''}}" value="{{ old('creditos') }}" min="0" required autofocus>
								@if ($errors->has('creditos'))
									<span class="invalid-feedback">
										<strong>{{ $errors->first('creditos') }}</strong>
									</span>
								@endif
							</div>
						</div>
						<div class="form-group row">
							<legend class="col-md-3 col-form-label text-md-right">Pré-requito</legend>
							<div class="col-md-8">
								<input type="text" name="requisito_cod" id="requisito_cod" class="form-control" autofocus>
							</div>
						</div>
						<div class="form-group row mb-0">
							<div class="col-md-6 offset-md-4">
								<a href="{{URL::previous()}}" class="btn btn-primary text-white"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
								<button type="submit" class="btn btn-primary">Cadastrar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
