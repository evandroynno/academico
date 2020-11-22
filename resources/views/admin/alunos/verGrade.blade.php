@extends('admin.layout.admin')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-12">
			<div class="card bg-nav">
				<div class="card-header">Grade</div>
				<div class="card-body">
					<h4>Materias cadastradas</h4>
					<ul>
						@forelse ($mats as $materia)
							<li>{{$materia->name}}</li>
						@empty
							Grade não Cadastrada
						@endforelse
					</ul>
					{{-- <div class="table-responsive">
						<table class="table table-striped table-bordered table-hover">
							<thead>
								<tr>
									<th scope="col">Horários</th>
									<th scope="col">Segunda</th>
									<th scope="col">Terça</th>
									<th scope="col">Quarta</th>
									<th scope="col">Quinta</th>
									<th scope="col">Sexta</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th scope="row"></th>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<th scope="row"></th>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<th scope="row"></th>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<th scope="row"></th>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<th scope="row" colspan="6" class="text-center">Almoço</th>
								</tr>
								<tr>
									<th scope="row"></th>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<th scope="row"></th>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<th scope="row"></th>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<th scope="row"></th>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<th scope="row"></th>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div> --}}
				</div>
				<div class="card-footer">
						<a href="{{URL::previous()}}" class="btn btn-primary text-white"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
