@extends('admin.layout.admin')
@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<card titulo="Lista de Alunos" i="fas fa-book-reader" cor="bg-nav" voltar="{{route('admin.home')}}">
				<table class="table table-striped table-sm-responsive text-nowarp w-100">
					<thead>
						<tr>
							<th>Aluno</th>
							<th>Ação</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($alunos as $aluno)
						<tr>
							<td>{{$aluno->name}}</td>
							<td>
								<a href="{{url("/admin/lancar_Notas/$aluno->id")}}" class="btn btn-primary text-white">Lancar Notas</a>
							</td>
						</form>
						</tr>
						@empty

						@endforelse
					</tbody>
				</table>
			</card>
		</div>
	</div>
</div>
@endsection
