<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-10">
			<form action="<?php echo e(route('professor.salvarPresenca')); ?>" method="post">
				<?php echo csrf_field(); ?>
				<card titulo='Lista de Presença' i='fas fa-users' cor="bg-nav" submit="Salvar" voltar="<?php echo e(route('professor.home')); ?>">
					<div class="row mb-2">
						<div class="col-md-6">
							<strong>Disciplina:</strong> <?php echo e($disciplina->name); ?> <input type="hidden" name="disciplina" id="disciplina" value="<?php echo e($disciplina->cod); ?>" >
						</div>
						<div class="col-md-6">
							<strong>Data:</strong> <?php echo e(\Carbon\Carbon::parse($data)->format('d/m/Y')); ?>

							<input type="hidden" name="data" value="<?php echo e($data); ?>">
						</div>
					</div>
					<table class="table table-sm-responsive text-nowrap w-100">
						<thead>
							<th>Aluno</th>
							<th class="text-center">Presença</th>
						</thead>
						<tbody>
							<?php $__empty_1 = true; $__currentLoopData = $lista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
							<tr>
								<td><label for="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></label></td>
								<td class="text-center"><input type="checkbox" name="listarPresenca[]" value="<?php echo e($item->matricula); ?>" id="<?php echo e($item->id); ?>" checked></td>
							</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

							<?php endif; ?>
							<tr>
								<td><strong>Selecionar Todos</strong></td>
								<td class="text-center"><input type="checkbox" name="checkTodos" id="checkTodos"></td>
							</tr>
						</tbody>
					</table>
				</card>
			</form>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('professor.layout.professor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>