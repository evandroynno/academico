<?php $__env->startSection('content'); ?>
<div class="container">
	<?php if(session('status')): ?>
		<div class="row alert alert-info alert-dismissible fade show" role="alert">
			<?php echo e(session('status')); ?>

			<button type="button" class="close" data-dismiss="alert" aria-label="Fechar">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	<?php endif; ?>
	<div class="row justify-content-center">
		<div class="col-md-10">
			<card titulo='Lista de Professores' i='fas fa-th-list' cor='bg-nav' voltar="<?php echo e(route('admin.home')); ?>">
				<div class="row">
					<div class="mb-2 col-md-6 offset-md-6 col-lg-5 offset-lg-7">
						<input type="text" name="busca" id="busca" placeholder="Buscar" data-list='.list' class="form-control">
					</div>
				</div>
				<ul class="list list-group list-group-flush">
					<?php $__empty_1 = true; $__currentLoopData = $professores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $professor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
						<li class="list-group-item">
							<div class="row">
								<div class="col-sm-6 col-md-4"><strong>Nome:</strong> <?php echo e($professor->name); ?></div>
								<div class="col-sm-6 col-md-4"><strong>Email:</strong> <?php echo e($professor->email); ?></div>
								<div class="col-sm-6 col-md-4"><strong>Eclesialidade:</strong> <?php echo e($professor->eclesialidade); ?></div>
								<div class="col-sm-6 col-md-4"><strong>Titularidade:</strong> <?php echo e($professor->titulo); ?></div>
								<div class="col-sm-6 col-md-4"><strong>Especialização:</strong> <?php echo e($professor->especializacao); ?></div>
								<div class="col-sm-6 col-md-4"><strong>Instituição:</strong> <?php echo e($professor->instituicao); ?></div>

								<div class="col-sm-6 col-md-4"><strong>Disciplina:</strong>
									<?php if($professor->disciplinas): ?>
										<?php $__currentLoopData = $professor->disciplinas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $disc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<?php echo e($disc->disciplina->name); ?>,
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<?php else: ?>
									'Sem disciplina atribuida'
									<?php endif; ?>
									
							</div>
							<div class="row">
								<div class="col-4">
									<div class="btn-group" role="group">
										<button class="btn btn-primary dropdown-toggle" id="btnGroupDrop1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Opções</button>
										<div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
												<button type="button" class="dropdown-item" data-toggle="modal" data-target="#modal<?php echo e($professor->id); ?>">Atribuir Disciplina</button>
											</div>
										</div>
								</div>
							</div>
						</li>
						<div class="modal fade modal-select" id="modal<?php echo e($professor->id); ?>" tabindex="-1" role="dialog" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content bg-nav">
									<form action="<?php echo e(route('admin.atribuirDisciplina')); ?>" method="POST">
										<div class="modal-header">Atribuir Disciplina</div>
										<div class="modal-body">
											<?php echo csrf_field(); ?>
											<input type="hidden" name="idProfessor" value="<?php echo e($professor->id); ?>">
											<input type="hidden" name="local" value="<?php echo e($professor->local); ?>">
											
											<input type="hidden" name="semestre" value="<?php echo e($turma->semestre?$turma->semestre:'Semestre cadastrado'); ?>">
											<div class="form-group row">
												<legend class="col-md-4 col-form-label text-md-right">Matérias para o Semestre:</legend>
												<div class="col-md-8">
													<select name="disciplinas[]" required class="form-control select-multiple2" multiple='multiple'>
														<?php $__currentLoopData = $disciplinas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $disciplina): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
															<?php if(preg_match('/'.$disciplina->cod.'/',$turma->disciplinas)): ?>
																<option value="<?php echo e($disciplina->id); ?>"><?php echo e($disciplina->name); ?></option>
															<?php endif; ?>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</select>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
											<button type="submit" class="btn btn-primary">Enviar</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
						<li class="list-group-item">Nenhum Professor Cadastrado</li>
					<?php endif; ?>
				</ul>
			</card>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>