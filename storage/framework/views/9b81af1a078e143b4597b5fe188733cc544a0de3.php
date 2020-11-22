<?php $__env->startSection('content'); ?>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-12">
			<card titulo="Reletorio de Movimentação" i="fas fa-dollar-sign" cor="bg-nav" voltar="<?php echo e(route('admin.home')); ?>">
				<div class="row">
					<div class="mb-2 col-md-6 offset-md-6 col-lg-5 offset-lg-7 text-right">
						<a href="<?php echo e(route('admin.baixarRelatorioMovs')); ?>" class="btn btn-primary text-white" target="_blank"><i class="fas fa-download"></i> Salvar em PDF</a>
					</div>
				</div>
				<div class="table-responsive">
					<table class="table table-striped table-responsive">
						<thead>
							<tr>
								<td class="text-nowrap" scope="col">Nome</td>
								<td class="text-nowrap" scope="col">Tipo</td>
								<td class="text-nowrap" scope="col">Valor</td>
								<td class="text-nowrap" scope="col">Descrição</td>
								<td class="text-nowrap" scope="col">Data</td>
							</tr>
						</thead>
						<tbody class="list">
							<?php $__empty_1 = true; $__currentLoopData = $movs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
								<tr
								<?php if($mov->tipo == 'E'): ?>
									class="text-white bg-success"
								<?php else: ?>
									class="text-white bg-danger"
								<?php endif; ?>
								>
									<td class="text-nowrap"><?php echo e($mov->nome); ?></td>
									<td class="text-nowrap">
										<?php if($mov->tipo == 'E'): ?>
											Entrada
										<?php else: ?>
											Saída
										<?php endif; ?>
									</td>
									<td class="text-nowrap">
										R$ <?php echo e($mov->valor); ?>,00
									</td>
									<td class="text-nowrap"><?php echo e($mov->descricao); ?></td>
									<td class="text-nowrap"><?php echo e(date( 'd-m-Y' , strtotime($mov->data) )); ?></td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
								<tr>
									<td colspan="5"><h3>Não há registros</h3></td>
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

<?php echo $__env->make('admin.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>