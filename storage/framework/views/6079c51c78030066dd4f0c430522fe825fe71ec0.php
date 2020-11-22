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
		<div class="col-md-12">
			<div class="card bg-nav">
				<div class="card-header"><i class="fas fa-th-list"></i> Lista de Disciplinas</div>

				<div class="card-body">
					<ul class="list-group list-group-flush">
						<li class="list-group-item">
							<div class="row">
								<div class="col-2"><strong>Código</strong></div>
								<div class="col-3"><strong>Nome da Disciplina</strong></div>
								<div class="col-1"><strong>Crédito</strong></div>
								<div class="col-4"><strong>Requisito</strong></div>
								<div class="col-2"><strong>Ações</strong></div>
							</div>
						</li>
					</ul>
					<ul class="list-group list-group-flush">
						<?php $__empty_1 = true; $__currentLoopData = $disciplinas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $disciplina): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
							<li class="list-group-item">
								<div class="row">
									<div class="col-2"><?php echo e(strtoupper($disciplina->cod)); ?></div>
									<div class="col-3"><?php echo e($disciplina->name); ?></div>
									<div class="col-1"><?php echo e($disciplina->creditos); ?></div>
									<div class="col-4">
										<?php if(isset($disciplina->requisito_cod)): ?>
											<?php echo e(strtoupper($disciplina->requisito_cod)); ?> - <?php echo e($disciplina->requisito()->first()->name); ?>

										<?php endif; ?>
									</div>
									<div class="col-2">
										<a href="#"><i class="fas fa-times-circle text-danger icone"></i></a>
										<a data-toggle="collapse" href="#collapse<?php echo e($disciplina->cod); ?>" aria-expanded="false" aria-controls="collapse<?php echo e($disciplina->cod); ?>"><i class="fas fa-info-circle text-info icone"></i></a>
									</div>
								</div>
								<div class="row mt-3 collapse" id='collapse<?php echo e($disciplina->cod); ?>'>
									<div class="col-2"><strong>Etapa Anual</strong></div>
									<div class="col-4">
										<?php echo e($disciplina->semestre); ?>

									</div>
									<div class="col-2"><strong>Semestre</strong></div>
									<div class="col-4"><?php echo e($disciplina->periodo); ?></div>
								</div>
							</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
							<h4 class="text-center mt-2">Não há disciplinas cadastradas</h4>
						<?php endif; ?>
					</ul>
				</div>
				<div class="card-footer">
					<div class="btn-group">
						<a href="<?php echo e(route('admin.home')); ?>" class="btn btn-primary text-white"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
						<a href="<?php echo e(route('admin.cadDisciplina')); ?>" class="btn btn-primary text-white"><i class="fas fa-plus-circle"></i> Adicionar Disciplina</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>