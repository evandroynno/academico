@extends("admin.layout.admin")
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<form action="{{route('admin.alunosMateria')}}" method="POST" >
				@csrf
				<card titulo='Selecione a Disciplina' cor="bg-nav" submit="Próximo" voltar="{{route('admin.home')}}">
					<div class="form-group row">
						<label for="disciplina" class="col-form-label col-md-3 text-md-right">Disciplina</label>
						<div class="col-md-7">
							<select name="disciplina" id="disciplina" class="form-control">
								@forelse ($disciplinas as $item)
									<option value="{{$item->id}}">{{$item->name}}</option>
								@empty
									<option value="" disabled>Sem Materia cadastrada</option>
								@endforelse
							</select>
						</div>
					</div>
				</card>
			</form>
		</div>
	</div>
</div>
@endsection
