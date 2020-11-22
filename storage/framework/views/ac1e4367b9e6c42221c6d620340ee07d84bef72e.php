<?php $__env->startSection('content'); ?>
<div class="container">
	<?php if(session('status')): ?>
		<div class="ror alert alert-info" role="alert">
			<?php echo e(session('status')); ?>

		</div>
	<?php endif; ?>
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card bg-nav">
				<div class="card-header"><i class="fas fa-th-list"></i>	Listas de Materiais OnLine</div>
				<div class="card-body">
					<ul class="list-group list-group-flush">
						<?php $__empty_1 = true; $__currentLoopData = $materiais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
							<li class="list-group-item">
								<div class="row">
									<div class="col-md-4"><strong>Material:</strong> <?php echo e($material->name); ?></div>
									<div class="col-md-2"><strong>Disciplina:</strong> <?php echo e($material->disciplina()->first()->name); ?></div>
									<div class="col-md-4"><strong>Link:</strong> <a href="<?php echo e($material->link); ?>" target="blank"> <?php echo e($material->link); ?></a></div>
									<div class="col-md-2">
										<a href="<?php echo e(url("admin/deletar_material/$material->id")); ?>" class="btn btn-danger text-white"><i class="fas fa-times-circle icone"></i> Apagar</a>
									</div>
								</div>
							</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
							<h4 class="text-center mt-2">Não há materiais cadastrados</h4>
						<?php endif; ?>
					</ul>
				</div>
				<div class="card-footer">
					<div class="btn-group">
						<a href="<?php echo e(route('admin.home')); ?>" class="btn btn-primary"><i class="fas fa-arrow-circle-left"></i> Voltar</a>
						<a href="<?php echo e(route('admin.cadMaterial')); ?>" class="btn btn-primary"><i class="fas fa-plus-circle"></i> Cadastrar Material</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>