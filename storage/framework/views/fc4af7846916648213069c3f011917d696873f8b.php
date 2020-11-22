<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-10">
			<div class="card bg-nav">
				<div class="card-header"><i class="fas fa-book"></i> Disciplinas Inscritas</div>
				<div class="card-body">
					<ul>
						<?php $__empty_1 = true; $__currentLoopData = $mats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $materia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
							<li><?php echo e($materia->name); ?></li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
							Grade não Cadastrada
						<?php endif; ?>
					</ul>

				</div>
				<div class="card-footer">
					<div class="btn-group">
						<a href="<?php echo e(route('aluno.home')); ?>" class="btn btn-primary text-white"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('aluno.layout.aluno', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>