<?php $__env->startSection('content'); ?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-12">
				<div class="card bg-nav">
					<form method="POST" name="grade" action="<?php echo e(route('admin.cadGradeOk')); ?>">
						<?php echo csrf_field(); ?>
					<div class="card-header">Grade de Aulas</div>
					<div class="card-body">
						<div class="container my-3">
							<div class="row">
								<div class="col-sm-6 col-md-1"><strong>Matricula</strong></div>
								<div class="col-sm-6 col-md-5"><?php echo e($aluno->matricula); ?></div>
								<div class="col-sm-6 col-md-1"><strong>Bolsista</strong></div>
								<div class="com-sm-6 col-md-5"><?php echo e($aluno->bolsa?'Sim ('.$aluno->bolsa->percentual.'%)':'Não'); ?></div>
							</div>
							<div class="row">
								<div class="col-sm-6 col-md-1"><strong>Aluno</strong></div>
								<div class="col-sm-6 col-md-5"><?php echo e($aluno->name); ?></div>
							</div>
						</div>
						<div class="row justify-content-center mt-5">
							<strong class="text-center">Semestre <?php echo e($turma->semestre); ?></strong>
						</div>
						<div class="row mt-4 text-center">
						<?php $__currentLoopData = $disciplinas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $disciplina): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-3">
								<div class="form-group">
									<label <?php echo e(in_array_r($disciplina->cod,$materias)&&$materias[$disciplina->cod]->status == 'aprovado'? "class=text-success data-toggle=tooltip data-placement=top title=Materia_cursada":""); ?> <?php echo e($disciplina->requisito_cod != null? "class=text-muted data-toggle=tooltip data-placement=top title=Requer_materia":""); ?>><?php echo e($disciplina->name); ?>

										<input type="checkbox" data-cred="<?php echo e($disciplina->creditos); ?>" data-req="<?php echo e($disciplina->requisito_cod); ?>" id="<?php echo e($disciplina->cod); ?>" name="disciplinas[]" value="<?php echo e($disciplina->cod); ?>" onclick="somar()" <?php echo e(in_array($disciplina->cod,$grade)?'checked':''); ?> <?php echo e((in_array_r($disciplina->cod,$materias)&&$materias[$disciplina->cod]->status == 'aprovado') || $disciplina->requisito_cod != null? "disabled":""); ?> >
									</label>
								</div>
							</div>
							<?php if($loop->iteration%4==0): ?>
								</div>
								<div class="row mt-3 text-center">
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div>
					<div class="card-footer">
						<input type="hidden" name="credSomado" id="credSomado" value="0">
						<input type="hidden" name="bolsa" value="<?php echo e($aluno->bolsa ? $aluno->bolsa->percentual : '0'); ?>">
						<input type="hidden" name='semestre' value="<?php echo e($turma->semestre); ?>">
						<a href="<?php echo e(URL::previous()); ?>" class="btn btn-primary text-white"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
						<button type="submit" class="btn btn-primary">Enviar</button>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>