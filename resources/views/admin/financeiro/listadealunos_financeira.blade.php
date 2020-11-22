@extends('admin.layout.admin')

@section('content')
<div class="container">
	@if (session('status'))
		<div class="row alert alert-primary" role="alert">
			{{session('status')}}
		</div>
	@endif
	<div class="row justify-content-center">
		<div class="col-12">
			<div class="card bg-nav">
				<div class="card-header">Listas de alunos</div>
				<div class="card-body">
					<div class="row">
						<div class="mb-2 col-md-6 offset-md-6 col-lg-5 offset-lg-7">
							<input type="text" name="busca" id="busca" placeholder="Buscar" class="form-control" data-list=".list">
						</div>
					</div>
					<ul class="list list-group list-group-flush">
						@forelse ($alunos_pagantes as $aluno)
						<li class="list-group-item">
							<div class="row align-items-baseline">
								<div class="col-3">Matricula: {{matriculaMask($aluno->matricula)}}</div>
								<div class="col-6">Nome: {{$aluno->name}}</div>
								<div class="col-3"><a href="{{URL("admin/efetuar_pagamento/$aluno->id")}}" class="btn btn-primary text-white"><i class="fas fa-eye"></i> Ver</a></div>
							</div>
						</li>
						@empty
							<h4 class="text-center mt-2">Alunos não encontrados</h4>
						@endforelse
					</ul>
				</div>
				<div class="card-footer">
					<a href="{{route('admin.home')}}" class="btn btn-primary text-white"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
