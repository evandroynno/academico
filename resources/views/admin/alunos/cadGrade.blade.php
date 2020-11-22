@extends('admin.layout.admin')
@section('content')
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="card bg-nav">
					<form method="POST" name="grade" action="{{route('admin.cadGradeOk')}}">
						@csrf
					<div class="card-header">Grade de Aulas</div>
					<div class="card-body">
						<div class="container my-3">
							<div class="row">
								<div class="col-sm-6 col-md-1"><strong>Matricula</strong></div>
								<div class="col-sm-6 col-md-5">{{$aluno->matricula}}</div>
								<div class="col-sm-6 col-md-1"><strong>Bolsista</strong></div>
								<div class="com-sm-6 col-md-5">{{$aluno->bolsa?'Sim ('.$aluno->bolsa->percentual.'%)':'Não'}}</div>
							</div>
							<div class="row">
								<div class="col-sm-6 col-md-1"><strong>Aluno</strong></div>
								<div class="col-sm-6 col-md-5">{{$aluno->name}}</div>
							</div>
						</div>
						<div class="row justify-content-center mt-5">
							<strong class="text-center">Semestre {{$turma->semestre}}</strong>
						</div>
						<div class="row mt-4 text-center">
						@foreach ($disciplinas as $disciplina)
							<div class="col-3">
								<div class="form-group">
									<label {{in_array_r($disciplina->cod,$materias)&&$materias[$disciplina->cod]->status == 'aprovado'? "class=text-success data-toggle=tooltip data-placement=top title=Materia_cursada":""}} {{$disciplina->requisito_cod != null? "class=text-muted data-toggle=tooltip data-placement=top title=Requer_materia":""}}>{{$disciplina->name}}
										<input type="checkbox" data-cred="{{$disciplina->creditos}}" data-req="{{$disciplina->requisito_cod}}" id="{{$disciplina->cod}}" name="disciplinas[]" value="{{$disciplina->cod}}" onclick="somar()" {{in_array($disciplina->cod,$grade)?'checked':''}} {{(in_array_r($disciplina->cod,$materias)&&$materias[$disciplina->cod]->status == 'aprovado') || $disciplina->requisito_cod != null? "disabled":""}} >
									</label>
								</div>
							</div>
							@if($loop->iteration%4==0)
								</div>
								<div class="row mt-3 text-center">
							@endif
						@endforeach
						</div>
					</div>
					<div class="card-footer">
						<input type="hidden" name="credSomado" id="credSomado" value="0">
						<input type="hidden" name="bolsa" value="{{$aluno->bolsa ? $aluno->bolsa->percentual : '0'}}">
						<input type="hidden" name='semestre' value="{{$turma->semestre}}">
						<a href="{{URL::previous()}}" class="btn btn-primary text-white"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
						<button type="submit" class="btn btn-primary">Enviar</button>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('script')
<script>
	// pegar os creds, somar em um input e enviar para o controller
	function somar(){
		var result = $("input:checked");
		var somado = 0;

		for(var i=0; i<result.length; i++){
			somado = somado + parseInt(result[i].getAttribute('data-cred'));
		}
		$('#credSomado').val(somado);

	}
	somar();
	$(':checkbox').click(somar);

	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	})
	//Checar requisito
	// ver se o input com o value igual ao requisito_cod
	var input = $("input:checkbox");

	//bloqueando checks com requisito
	// for(var i=0; i<input.length; i++){
	// 	if(input[i].getAttribute('data-req') != ""){
	// 		var req = document.getElementById(input[i].getAttribute('data-req'));
	// 		if(req != null && req.checked){
	// 			input[i].disabled = false;
	// 		}else{
	// 			input[i].disabled = true;
	// 		}
	// 	}
	// }
	// function clicar(inp){
	// 	for(var i=0; i<input.length; i++){
	// 		if(input[i].getAttribute("data-req") == inp.id){
	// 			input[i].disabled = !inp.checked;
	// 		}
	// 	}
	// }
</script>
@endsection
