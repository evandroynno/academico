<?php $__env->startSection('content'); ?>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-10">
			<card titulo="Notas do Curso" i="fas fa-book-reader" cor="bg-nav" voltar="<?php echo e(route('aluno.home')); ?>">
				<div class="table-responsive-lg">
					<table class="table">
						<thead>
							<tr>
								<th class="text-nowrap">Disciplina</th>
								<th class="text-nowrap">Nota 1</th>
								<th class="text-nowrap">Nota 2</th>
								<th class="text-nowrap">Nota Final</th>
								<th class="text-nowrap">Observações</th>
							</tr>
						</thead>
						<tbody>
							<?php $__empty_1 = true; $__currentLoopData = $notas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
							<tr>
								<td class="text-nowrap"><?php echo e($note->disciplina->cod); ?> - <?php echo e($note->disciplina->name); ?></td>
								<td class="text-nowrap">
									<?php if($note->nota1 == 0): ?>
										Nota não atribuída
									<?php else: ?>
										<?php echo e($note->nota1); ?>

									<?php endif; ?>
								</td>
								<td class="text-nowrap">
									<?php if($note->nota1 == 0): ?>
										Nota não atribuída
									<?php else: ?>
										<?php echo e($note->nota1); ?>

									<?php endif; ?>

								</td>
								<td class="text-nowrap">
									<?php if($note->notaFinal == 0): ?>
										Nota não atribuída
									<?php else: ?>
										<?php echo e($note->notaFinal); ?>

									<?php endif; ?>
								</td>
								<td class="text-nowrap"><?php echo e($note->Observação); ?></td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
							<tr>
								<td colspan="5">Nenhuma Nota Atribuída</td>
							</tr>
							<?php endif; ?>
						</tbody>
					</table>
				</div>
			</card>
		</div>
	</div>
	
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('aluno.layout.aluno', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>