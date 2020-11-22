@extends('admin.layout.admin')

@section('content')
<div class="container">
	@if(session('status'))
	<div class="row alert alert-success" role="alert">
		{{session('status')}}
	</div>
	@endif
	<div class="row justify-content-center">
		<div class="col-12">
			<div class="card bg-nav">
				<div class="card-header">Histórico</div>
				<div class="card-body">
					<div class="row justify-content-center">
						<div><h3>Curso de Mestrado em Direito Canônico</h3></div>
					</div>
					<div class="row justify-content-center">
						<div><h3>Histórico</h3></div>
					</div>
					<div class="row">
						<div class="col-6">Nome: {{$aluno->name}}</div>
						<div class="col-6">Matricula: {{$aluno->matricula}}</div>
					</div>
					<div class="table-responsive">
						<table class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Código</th>
									<th>Disciplina</th>
									<th>CR</th>
									<th>Nota</th>
									<th>COF/CRD</th>
								</tr>
								<tbody>
									@foreach($disciplinas as $disciplina)
									<tr>
										<td>{{$disciplina->cod}}</td>
										<td>{{$disciplina->name}}</td>
										<td>{{$disciplina->creditos}}</td>
										<td>{{isset($aluno->notas->where('disciplina_id',$disciplina->id)->first()->notaFinal)? $aluno->notas->where('disciplina_id',$disciplina->id)->first()->notaFinal:''}}</td>
										<td>{{isset($aluno->notas->where('disciplina_id',$disciplina->id)->first()->status)? $aluno->notas->where('disciplina_id',$disciplina->id)->first()->status:'Não Cursado'}}</td>
									</tr>
									@endforeach
								</tbody>
							</thead>
						</table>
					</div>
				</div>
				<div class="card-footer">
					<a href="{{URL::previous()}}" class="btn btn-primary text-white"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
					<a href="{{url("admin/lista_de_alunos/gerarHistoricoPDF/$aluno->id")}}" class="btn btn-primary text-white"><i class="fas fa-download"></i> Salvar em PDF</a>
				</div>
			</div>
		</div>
	</div>

</div>
@endsection
