<?php $__env->startSection('content'); ?>
<div class="container">
	<?php if(session('status')): ?>
		<div class="row alert alert-success" role="alert">
			<?php echo e(session('status')); ?>

		</div>
	<?php endif; ?>
	<div class="row justify-content-center">
		<div class="col-md-10">
			<card titulo="Lista de Alunos" i="fas fa-book-reader" cor="bg-nav" voltar="<?php echo e(route('professor.home')); ?>">
				<table class="table table-striped table-sm-responsive text-nowarp w-100">
					<thead>
						<tr>
							<th>Aluno</th>
							<th>Ação</th>
						</tr>
					</thead>
					<tbody>
						<?php $__empty_1 = true; $__currentLoopData = $alunos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aluno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
						<tr>
							<td><?php echo e($aluno->name); ?></td>
							<td>
								<a href="<?php echo e(url("/professor/lancar_Notas/$aluno->id")); ?>" class="btn btn-primary text-white">Lancar Notas</a>
							</td>
						</form>
						</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

						<?php endif; ?>
					</tbody>
				</table>
			</card>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('professor.layout.professor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>