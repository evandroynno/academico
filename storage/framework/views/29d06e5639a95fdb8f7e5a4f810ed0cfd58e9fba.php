<?php $__env->startSection('content'); ?>
<div class="container">
	<?php if(session('status')): ?>
		<div class="row alert alert-info" role="alert">
			<?php echo e(session('status')); ?>

		</div>
	<?php endif; ?>
	<?php if(session('error')): ?>
		<div class="row alert alert-danger" role="alert">
			<?php echo e(session('error')); ?>

		</div>
	<?php endif; ?>
	<div class="row justify-content-center">
		<div class="col-md-10">
			<form action="" method="post">
				<?php echo csrf_field(); ?>
				<card titulo="Cadastrar Material" i='fas fa-book' cor="bg-nav" voltar="<?php echo e(route('professor.home')); ?>" submit="Cadastrar">
					<div class="form-group row">
							<legend class="col-md-4 col-form-label text-md-right">Nome do Material</legend>
							<div class="col-md-6">
								<input type="text" name="nomeMaterial" id="nomeMaterial" class="form-control" autofocus required>
							</div>
						</div>
						<div class="form-group row">
							<legend class="col-md-4 col-form-label text-md-right">Disciplina</legend>
							<div class="col-md-6">
								<select name="disciplina_cod" id="disciplina_cod" class="form-control">
									<option value="">Escolha uma Disciplina</option>
									<?php $__empty_1 = true; $__currentLoopData = Auth::user()->disciplinas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $disciplina): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
										<option value="<?php echo e($disciplina->disciplina->cod); ?>"><?php echo e($disciplina->disciplina->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

									<?php endif; ?>
								</select>
							</div>
						</div>
						<div class="form-group row">
							<legend class="col-md-4 col-form-label text-md-right">Link</legend>
							<div class="col-md-6">
								<input type="text" name="link" id="link" class="form-control" autofocus required>
							</div>
						</div>
					</div>
				</card>
			</form>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('professor.layout.professor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>