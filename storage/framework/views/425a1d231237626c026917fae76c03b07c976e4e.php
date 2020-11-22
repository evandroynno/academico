<?php $__env->startSection('content'); ?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-10">
				<div class="card bg-nav">
					<div class="card-header"><i class="fas fa-book"></i> Material de estudo on-line</div>
					<div class="card-body">
						<ul class="list-group list-group-flush">
							<?php $__empty_1 = true; $__currentLoopData = $materiais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
								<li class="list-group-item">
									<div class="row">
										<div class="col-md-4"><strong>Material:</strong> <?php echo e($material->name); ?></div>
										<div class="col-md-5"><strong>Disciplina:</strong> <?php echo e($material->disciplina()->first()->name); ?></div>
										
										<div class="col-md-3">
											<a href="<?php echo e($material->link); ?>" target="blank" class="btn btn-primary text-white"><i class="fas fa-eye icone"></i> Visualizar</a>
										</div>
									</div>
								</li>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
								<h4 class="text-center mt-2">Não há materiais cadastrados</h4>
							<?php endif; ?>
						</ul>
					</div>
					<div class="card-footer">
						<a href="<?php echo e(route('aluno.home')); ?>" class="btn btn-primary text-white"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('aluno.layout.aluno', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>