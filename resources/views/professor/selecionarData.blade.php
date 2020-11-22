@extends('admin.layout.admin')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-8">
			<div class="card bg-nav">
				<form action="{{route('professor.listarAlunos')}}" method="post">
					@csrf

					<div class="card-header">Escolha a Data</div>
					<div class="card-body">
						<div class="form-group row">
							<label for="data" class="col-md-3 col-form-label text-md-right">Data</label>
							<div class="col-md-6">
								<input type="date" name="data" id="data" class="form-control" value="{{date('Y-m-d')}}">
							</div>
						</div>
						<div class="form-group row">
							<label for="disciplina" class="col-md-3 col-form-label text-md-right">Disciplina:</label>
							<div class="col-md-6">
								<select name="disciplina" id="disciplina" class="form-control">
									@forelse ($disciplinas as $item)
										<option value="{{$item->disciplina->id}}">{{$item->disciplina->name}}</option>
									@empty
										<option value="" disabled>Sem Materia cadastrada</option>
									@endforelse
									{{-- $disciplinas --}}
								</select>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<button class="btn btn-primary" type="submit">Avançar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
@section('script')
<script>
	document.getElementById("data").valueAsDate = new Date();
</script>
@endsection
