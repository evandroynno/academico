@extends('admin.layout.admin')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-8">
			<div class="card bg-nav">
				<form action="{{route('admin.criarTurmaOk')}}" method="POST">
					@csrf
					<div class="card-header">Criar Turma</div>
					<div class="card-body">
						<div class="form-group row">
							<legend class="col-md-4 col-form-label text-md-right">Semestre Referente:</legend>
							<div class="col-md-8">
								<input type="text" name="semestre" id="semestre" class="form-control" placeholder="Semestre">
							</div>
						</div>
						<div class="form-group row">
							<legend class="col-md-4 col-form-label text-md-right">Matérias para o Semestre:</legend>
							<div class="col-md-8">
								<select name="disciplinas[]" class="form-control select-multiple" multiple='multiple'>
									@foreach ($disciplinas as $disciplina)
										<option value="{{$disciplina->cod}}">{{$disciplina->name}}</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div class="btn-group">
							<a href="{{route('admin.home')}}" class="btn btn-primary text-white"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
							<button type="submit" class="btn btn-primary text-white"><i class="fas fa-plus-circle"></i> Criar Turma</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
