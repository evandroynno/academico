@extends('admin.layout.admin')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-12">
			<div class="card bg-nav">
				<form action="{{route('admin.addCred')}}" method="POST" onsubmit="return validar(this)" name="addCred">
				<div class="card-header">Adcionar Crédito</div>
				<div class="card-body">
					<div class="container-fluid">
						<strong>Nome:</strong> {{$aluno->name}} <br>
						<strong>Créditos Atuais:</strong> {{$aluno->creditos}} <br>
						@php
							$request->session()->put('aluno_id',$aluno->id);
						@endphp
					</div>
					@csrf
					<input type="number" name="cred" id="cred">
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-primary">Adicionar</button>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>

<script>
function validar(form){
	var cred = document.getElementById('cred');
	return confirm('Adicionar Créditos\nVocê irá adicionar '+cred.value+' créditos');
}
</script>
@endsection
