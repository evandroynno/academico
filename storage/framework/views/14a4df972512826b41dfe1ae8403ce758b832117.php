<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-8">
			<div class="card bg-nav">
				<form action="<?php echo e(route('admin.criarTurmaOk')); ?>" method="POST">
					<?php echo csrf_field(); ?>
					<div class="card-header">Criar Turma</div>
					<div class="card-body">
						<div class="form-group row">
							<legend class="col-md-4 col-form-label text-md-right">Semestre Referente:</legend>
							<div class="col-md-8">
								<input type="text" name="semestre" id="semestre" class="form-control" placeholder="Semestre">
							</div>
						</div>
						<div class="form-group row">
							<legend class="col-md-4 col-form-label text-md-right">Matérias para o Semestre:</legend>
							<div class="col-md-8">
								<select name="disciplinas[]" class="form-control select-multiple" multiple='multiple'>
									<?php $__currentLoopData = $disciplinas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $disciplina): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($disciplina->cod); ?>"><?php echo e($disciplina->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<div class="btn-group">
							<a href="<?php echo e(route('admin.home')); ?>" class="btn btn-primary text-white"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
							<button type="submit" class="btn btn-primary text-white"><i class="fas fa-plus-circle"></i> Criar Turma</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>