<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<card titulo="Lancar Notas - <?php echo e($disciplina->name); ?>" i="fas fa-book-reader" cor="bg-nav" voltar="<?php echo e(route('professor.home')); ?>">
				<div class="card bg-white">
					<form action="<?php echo e(route('admin.lancarNotasOk')); ?>" method="post">
						<?php echo csrf_field(); ?>
					<div class="card-header text-dark">
						<?php echo e($aluno->name); ?>

					</div>
					<div class="card-body bg-transparent">
						<input type="hidden" name="aluno_id" value="<?php echo e($aluno->id); ?>">
						<input type="hidden" name="disciplina_id" value="<?php echo e($disciplina->id); ?>">
						<div class="row">
							<div class="col-4">
								<div class="form-group row">
									<label for="nota_1" class="col-md-4 col-form-label text-md-right">Nota 1</label>
									<div class="col-md-8">
										<input class="form-control" type="number" min="0.0" max="10.0" maxlength="3" step='0.1' name="nota_1" value="<?php echo e($notas!=null?$notas->nota1:0.0); ?>">
									</div>
								</div>
							</div>
							<div class="col-4">
								<div class="form-group row">
									<label for="nota_2" class="col-md-4 col-form-label text-md-right">Nota 2</label>
									<div class="col-md-8">
										<input class="form-control" type="number" min="0.0" max="10.0" maxlength="3" step='0.1' name="nota_2" value="<?php echo e($notas!=null?$notas->nota2:0.0); ?>">
									</div>
								</div>
							</div>
							<div class="col-4">
								<div class="form-group row">
									<label for="nota_final" class="col-md-4 col-form-label text-md-right">Nota final</label>
									<div class="col-md-8">
										<input class="form-control" type="number" min="0.0" max="10.0" maxlength="3" step='0.1' name="nota_final" value="<?php echo e($notas!=null?$notas->notaFinal:0.0); ?>">
									</div>
								</div>
							</div>
						</div>

					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Gravar</button>
					</div>
					</form>
				</div>
			</card>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>