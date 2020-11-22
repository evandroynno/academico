@extends('admin.layout.admin')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<card titulo="Lancar Notas - {{$disciplina->name}}" i="fas fa-book-reader" cor="bg-nav" voltar="{{route('professor.home')}}">
				<div class="card bg-white">
					<form action="{{route('admin.lancarNotasOk')}}" method="post">
						@csrf
					<div class="card-header text-dark">
						{{$aluno->name}}
					</div>
					<div class="card-body bg-transparent">
						<input type="hidden" name="aluno_id" value="{{$aluno->id}}">
						<input type="hidden" name="disciplina_id" value="{{$disciplina->id}}">
						<div class="row">
							<div class="col-4">
								<div class="form-group row">
									<label for="nota_1" class="col-md-4 col-form-label text-md-right">Nota 1</label>
									<div class="col-md-8">
										<input class="form-control" type="number" min="0.0" max="10.0" maxlength="3" step='0.1' name="nota_1" value="{{$notas!=null?$notas->nota1:0.0}}">
									</div>
								</div>
							</div>
							<div class="col-4">
								<div class="form-group row">
									<label for="nota_2" class="col-md-4 col-form-label text-md-right">Nota 2</label>
									<div class="col-md-8">
										<input class="form-control" type="number" min="0.0" max="10.0" maxlength="3" step='0.1' name="nota_2" value="{{$notas!=null?$notas->nota2:0.0}}">
									</div>
								</div>
							</div>
							<div class="col-4">
								<div class="form-group row">
									<label for="nota_final" class="col-md-4 col-form-label text-md-right">Nota final</label>
									<div class="col-md-8">
										<input class="form-control" type="number" min="0.0" max="10.0" maxlength="3" step='0.1' name="nota_final" value="{{$notas!=null?$notas->notaFinal:0.0}}">
									</div>
								</div>
							</div>
						</div>

					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Gravar</button>
					</div>
					</form>
				</div>
			</card>
		</div>
	</div>
</div>
@endsection
