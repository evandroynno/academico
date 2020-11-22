<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-8">
			<div class="card bg-nav">
				<form action="<?php echo e(route('professor.listarAlunos')); ?>" method="post">
					<?php echo csrf_field(); ?>

					<div class="card-header">Escolha a Data</div>
					<div class="card-body">
						<div class="form-group row">
							<label for="data" class="col-md-3 col-form-label text-md-right">Data</label>
							<div class="col-md-6">
								<input type="date" name="data" id="data" class="form-control" value="<?php echo e(date('Y-m-d')); ?>">
							</div>
						</div>
						<div class="form-group row">
							<label for="disciplina" class="col-md-3 col-form-label text-md-right">Disciplina:</label>
							<div class="col-md-6">
								<select name="disciplina" id="disciplina" class="form-control">
									<?php $__empty_1 = true; $__currentLoopData = $disciplinas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<option value="<?php echo e($item->disciplina->id); ?>"><?php echo e($item->disciplina->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
										<option value="" disabled>Sem Materia cadastrada</option>
									<?php endif; ?>
									
								</select>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<button class="btn btn-primary" type="submit">Avançar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script>
	document.getElementById("data").valueAsDate = new Date();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>