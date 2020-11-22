@extends('admin.layout.admin')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-10">
			<div class="card bg-nav">
				<form action="{{route('admin.relatorioDeMensalidades')}}" method="POST">
					@csrf
				<div class="card-header">Escolha o Semestre</div>
				<div class="card-body">
					<div class="row justify-content-center">
						<div class="col-md-9">
							<select name="semestre" id="semestre" class="form-control">
							{{-- buscar por turmas para por em um select --}}
								@foreach ($turmas as $turma)
									<option value="{{$turma->semestre}}">{{$turma->semestre}}</option>
								@endforeach
							</select>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<a href="{{route('admin.home')}}" class="btn btn-primary text-white"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
					{{-- <a href="" class="btn btn-primary text-white"><i class="fas fa-arrow-circle-right"></i> Avançar</a> --}}
					<button class="btn btn-primary" type="submit"><i class="fas fa-arrow-circle-right"></i> Avançar</button>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
