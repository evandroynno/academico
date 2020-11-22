@extends('admin.layout.admin')

@section('content')
<div class="container">
	@if (session('status'))
		<status msg="{{ session('status') }}"></status>
	@endif
	<div class="row justify-content-center">
		<div class="col-md-10">
			{{-- @php(dd(json_encode($alunos->toArray()))) --}}
			<card titulo="Lista de Alunos há confirmar" i='fas fa-user' cor="bg-nav" voltar="{{route('admin.home')}}">
				<tabela-lista
					v-bind:titulos="['Nome','Matricula','Email']"
					v-bind:itens="{{json_encode($alunos->toArray())}}"
					editar="listar_pendenteOk/"
				>

				</tabela-lista>
			</card>
		</div>
	</div>
</div>
@endsection
