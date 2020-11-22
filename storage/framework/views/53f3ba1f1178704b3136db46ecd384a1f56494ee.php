<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<form action="<?php echo e(route('professor.alunosMateria')); ?>" method="post">
				<?php echo csrf_field(); ?>
				<card titulo='Selecione a Disciplina' cor="bg-nav" submit="Próximo" voltar="<?php echo e(route('professor.home')); ?>">
					<div class="form-group row">
						<label for="disciplina" class="col-form-label col-md-3 text-md-right">Disciplina</label>
						<div class="col-md-7">
							<select name="disciplina" id="disciplina" class="form-control">
								<?php $__empty_1 = true; $__currentLoopData = $disciplinas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
									<option value="<?php echo e($item->disciplina->id); ?>"><?php echo e($item->disciplina->name); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
									<option value="" disabled>Sem Materia cadastrada</option>
								<?php endif; ?>
							</select>
						</div>
					</div>
				</card>
			</form>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('professor.layout.professor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>